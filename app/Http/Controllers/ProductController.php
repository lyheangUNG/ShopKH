<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Color;
use App\Size;
use DB;
use Image;
use File;
use Alert;
use Hamcrest\Type\IsArray;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $products = Products::where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('id','like','%'.$keyword.'%')
                        // ->orWhere('image','like','%'.$keyword.'%')
                            ->orWhere('code','like','%'.$keyword.'%')
                            ->orWhere('price','like','%'.$keyword.'%')
                            // ->orWhere('size','like','%'.$keyword.'%')
                            ->orWhere('brand','like','%'.$keyword.'%')
                            // ->orWhere('created_at','like','%'.$keyword.'%')
                            // ->orWhere('updated_at','like','%'.$keyword.'%')
            ->paginate(3);
        $products->withPath('products');
        $products->appends($request->all());
        if ($request->ajax()) {
            return \Response::json(\View::make('product_list', array('products' => $products))->render());
        }
        $products_image = DB::table('color')
                        ->join('products', 'products.id', '=', 'color.product_id')
                        ->select('products.id', 'products.name', 'color.color','color.image')
                        ->where('color','default')
                        ->get();
        // dd($products_image);
        return view('admin.products.index',compact('products', 'keyword','products_image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::whereNotNull('parent_id')->get();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this-> validate($request,[
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required|unique:products',
            'name' => 'required|unique:products',
            //decimal with 2 digits floating point
            'price' => ['required','regex:/^\d+(\.\d{1,2})?$/'],
            'brand' => 'required',
            'category_id' => 'required',
            'title.*' => 'required',
            'image.*' => 'image|max:2048|mimes:png,jpg,svg,jpeg',
            // 'size.*' => 'required'
        ]);
        $products = new Products;
        $products->code = $request->input('code');
        $products->name = $request->input('name');
        $products->price = $request->input('price');
        $products->brand = $request->input('brand');
        $products->category_id = $request->input('category_id');
        $products->save();
        $product_id = $products->id;
        $sizesArray = $request->size;
        // dd($sizesArray[0]);
        // check if size not null
        if($sizesArray[0] != NULL){
            foreach ($sizesArray as $item => $size) {
                // echo $size;
                $sizes = new Size;
                $sizes->size = $size;
                $sizes->product_id = $product_id;
                $sizes->save();
            }
        }
        // dd($sizesArray);
        $index = 0;
        $image_order = 1;
        if($request->hasFile('image')){
            foreach($request->file('image') as $image)
            {
                $colors = new Color;
                $imgName = time().'.'.$image->getClientOriginalName();
                $imageCrop = Image::make($image)->resize(600, 600)->save( public_path('uploads\product_image\\' . $imgName ) );
                $colors->image = $imgName;
                $colors->color =  $_POST['title'][$index];
                $colors->product_id = $product_id;
                $colors->image_order = $image_order;
                // dd($product_id);
                $index++;
                $image_order++;
                $colors->save();
                // echo $colors;
            }
        }

        // $i=0;
        // if(is_array($_FILES['image']['name'])){
        //     foreach($_FILES['image']['name'] as $file){
        //         print_r($file);
        //         echo "<br>";
        //         $errors= array();
        //         $file_name = $_FILES['image']['name'][$i];
        //         $file_size =$_FILES['image']['size'][$i];
        //         $file_tmp =$_FILES['image']['tmp_name'][$i];
        //         $file_type=$_FILES['image']['type'][$i];
        //         // generate new image name
        //         // $temp = explode(".", $_FILES['image']);
        //         // // 123745.jpg
        //         // $newfilename = round(microtime(true)) . '.' . end($temp);
        //         echo $file = "{$_SERVER['DOCUMENT_ROOT']}/uploads/product_image/{$_FILES['image']['name'][$i]}";
        //         echo "<br><br>";
        //         $colors->image = $_FILES['image']['name'][$i];
        //         move_uploaded_file($_FILES['image']['tmp_name'][$i],$file);
        //         $i++;
        //     }
        // }

        // $products->save();
        // $colors->save();
        Alert::success('Product Creation', 'Successfully Created');
        // return redirect()->route('products.index');
        // dd($request->title);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        $products_image = DB::table('color')
                        ->join('products', 'products.id', '=', 'color.product_id')
                        ->select('products.id', 'products.name', 'color.color','color.image')
                        ->where('color','=','default')
                        ->get();
        $products_image_color = DB::table('color')
                        ->join('products', 'products.id', '=', 'color.product_id')
                        ->select('products.id', 'products.name', 'color.color','color.image')
                        ->where('color','!=','default')
                        ->get();
        $sizes = Size::where('product_id',$id)->get();
        // dd($sizes);
        return view('admin.products.show',compact('product','products_image','products_image_color','sizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = Products::where('pid',$id)->get()->first();
        $product = Products::find($id);
        // $subcategories = SubCategory::all();
        // $page = url()->current();
        // return view('admin.products.edit',compact('product','subcategories','page'));
        $categories = Categories::whereNotNull('parent_id')->get();
        $products_image = DB::table('color')
                        ->join('products', 'products.id', '=', 'color.product_id')
                        ->select('products.id', 'products.name','color.id as color_id', 'color.color','color.image','color.image_order')
                        ->where('color','=','default')
                        ->get();
        $products_image_color = DB::table('color')
                        ->join('products', 'products.id', '=', 'color.product_id')
                        ->select('products.id', 'products.name','color.id as color_id', 'color.color','color.image','color.image_order')
                        ->where('color','!=','default')
                        ->get();
        // $sub = DB::table('color')
        // $count_image = DB::table('color as c1')
        //                 ->join('products as p1', 'p1.id', '=', 'c1.product_id')
        //                 ->select('c1.id', 'p1.name', 'c1.color','c1.image','c1.image_order')
        //                 ->where('color','!=','default')
        //                 ->get();
                        // dd($products_image_color);
        return view('admin.products.edit',compact('product','categories','products_image','products_image_color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Products::findOrFail($id);
        $this-> validate($request,[
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required|unique:products,code,'.$products->id,
            'name' => 'required|unique:products,name,'.$products->id,
            //decimal with 2 digits floating point
            'price' => ['required','regex:/^\d+(\.\d{1,2})?$/'],
            'brand' => 'required',
            'category_id' => 'required',
            'title.*' => 'required',
            'image.*' => 'image|max:2048|mimes:png,jpg,svg,jpeg',
            'imgDB.*',
            'color_id',
            'numberOfImage'
        ]);
        $products->code = $request->input('code');
        $products->name = $request->input('name');
        $products->price = $request->input('price');
        $products->brand = $request->input('brand');
        $products->category_id = $request->input('category_id');
        $products->save();
        // if(is_array($request->title)){
        //     foreach($request->title as $item){
        //         // echo $request->{$item};
        //         $colorNameList[] = $item;
        //     }
        // }
        // $i=0;
        // dd($products->id);
        //can get id of product after save
        $product_id = $products->id;
        $color_id = $request->input('color_id');
        $numberOfImage = $request->input('numberOfImage');
        $imageOrder = $numberOfImage;
        $countColorImage = 0;
        $image_old = $request->input('imgDB');
        // dd($image_old[0]);
        $index = 0;
        // dd(count($request->file('image'));
        if($request->hasFile('image')){
            foreach($request->file('image') as $image)
            {
                if($countColorImage<$numberOfImage){
                    $colors = Color::findOrFail($color_id);
                    $imgName = time().'.'.$image->getClientOriginalName();
                    $imageCrop = Image::make($image)->resize(600, 600)->save( public_path('uploads\product_image\\' . $imgName ) );
                    File::delete(public_path('uploads\product_image\\' . $image_old[$countColorImage]));
                    $colors->image = $imgName;
                    $colors->color =  $_POST['title'][$index];
                    $colors->product_id = $product_id;
                    // dd($product_id);
                    $index++;
                    $color_id++;
                    $colors->save();
                }else if($countColorImage>=$numberOfImage){
                    $colors = new Color;
                    $imgName = time().'.'.$image->getClientOriginalName();
                    $imageCrop = Image::make($image)->resize(600, 600)->save( public_path('uploads\product_image\\' . $imgName ) );
                    $colors->image = $imgName;
                    $colors->color =  $_POST['title'][$index];
                    $colors->product_id = $product_id;
                    $colors->image_order = $imageOrder;
                    $imageOrder++;
                    // dd($product_id);
                    dd($colors);
                    $index++;
                    $colors->save();
                }
                $countColorImage++;
                // echo $colors;
            }
        }
        Alert::success('Product Update', 'Successfully Updated');
        // return redirect()->route('products.index');
        // dd($request->title);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        if($product->status === 1){
            $product->status = 0;
        }
        elseif($product->status === 0){
            $product->status = 1;
        }
        $product->save();
        // return response()->json('Success');
    }

    // public function storeImage(Request $req)
    // {
    //     // dd($_FILES['image']);
    //     // $product = new Product;
    //     // $product->name = $req->name;
    //     // $product->code = $req->code;
    //     // $product->price = $req->price;
    //     // $product->description = $req->description;
    //     // $product->subcat_id = $req->subcategory;
    //     // $product->save();

    //     // dd($product->id);
    //     // product images
    //     $i=0;
    //     foreach($_FILES['image']['name'] as $file){
    //                 print_r($file);
    //                 echo "<br>";
    //                 $errors= array();
    //                 $file_name = $_FILES['image']['name'][$i];
    //                 $file_size =$_FILES['image']['size'][$i];
    //                 $file_tmp =$_FILES['image']['tmp_name'][$i];
    //                 $file_type=$_FILES['image']['type'][$i];
    //                 // generate new image name
    //                 // $temp = explode(".", $_FILES['image']);
    //                 // // 123745.jpg
    //                 // $newfilename = round(microtime(true)) . '.' . end($temp);
    //                 echo $file = "{$_SERVER['DOCUMENT_ROOT']}/uploads/products/{$_FILES['image']['name'][$i]}";
    //                 echo "<br><br>";
    //                 $clogo = $_FILES['image']['name'][$i];
    //                 move_uploaded_file($_FILES['image']['tmp_name'][$i],$file);
    //         // $filename = $this->uploadImage($_FILES['image']['name'][$i], $_SERVER['DOCUMENT_ROOT']."/uploads/products/");
    //         $i++;
    //     }
    //     // for($i = 1; $i <= $req->totalImages; $i++) {
    //     //     if($_FILES['image'.$i]['name']) {
    //     //         $image = new ProductImage;
    //     //         $filename = $this->uploadImage($_FILES['image'.$i], $_SERVER['DOCUMENT_ROOT']."\uploads\products\\");
    //     //         $image->product_id = $product->id;
    //     //         $image->title = $_POST['title'.$i];
    //     //         $image->filename = $filename;
    //     //         $image->save();
    //     //     }
    //     // }
    //     return redirect()->route('product.index')->withStatus(__('Product created successfully.'));
    // }

}
