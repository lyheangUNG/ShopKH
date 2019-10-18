<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use App\Products;
use App\Categories;
use App\Size;
use App\Color;
use DB;
use Session;
use Alert;
class UserHomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();
        $products = Products::all();
        $products_image = DB::table('color')
                        ->join('products', 'products.id', '=', 'color.product_id')
                        ->select('products.id', 'products.name', 'color.color','color.image')
                        ->where('color','default')
                        ->get();
        $cartProducts = session('cartinfo');
        // dd($cartProducts);
        return view('index',compact('ads','products','products_image','cartProducts'));
    }

    public function men(){
        $categories = DB::table('categories')->whereNotNull('parent_id')->where('parent_id',1)->get();
        $products = Products::all();
        $products_image = DB::table('color')
                        ->join('products', 'products.id', '=', 'color.product_id')
                        ->select('products.id', 'products.name', 'color.color','color.image')
                        ->where('color','default')
                        ->get();
        return view('men',compact('categories','products','products_image'));
    }

    public function women(){
        $categories = DB::table('categories')->whereNotNull('parent_id')->where('parent_id',3)->get();
        $products = Products::all();
        $products_image = DB::table('color')
                        ->join('products', 'products.id', '=', 'color.product_id')
                        ->select('products.id', 'products.name', 'color.color','color.image')
                        ->where('color','default')
                        ->get();
        return view('women',compact('categories','products','products_image'));
    }

    public function show($id){
        $product = Products::findOrFail($id);
        $sizes = Size::where('product_id',$id)->get();
        $colors = Color::where('product_id',$id)->where('color','default')->get();
        $productColors = Color::where('product_id',$id)->where('color','!=','default')->get();
        return view('show',compact('product','sizes','colors','productColors'));
    }

    public function addtocart(Request $request,$id){
        $this-> validate($request,[
            'quantity' => 'required|integer|between:1,100',
            // 'productSize' => 'required',
            'productColor' => 'required',
        ]);
        $size = $request->productSize;
        $color = $request->productColor;
        $index = 0;
        // $quantity = array();
        // array_push($quantity, $request->quantity);
        // dd($quantity);
        // array_push($quantityList);
        // $user_id =  auth()->user()->id;
        // dd($user_id);
        $allProductSizes = Size::where('product_id',$id)->get()->toArray();
        if($allProductSizes != NULL){
            if($size == NULL){
                Alert::error('Size Selection', 'Please Select One Size');
                return back();
            }
            // dd($size);
        }
        $product = Products::findOrFail($id)->toArray();
        // $color = Color::where('product_id',$id)->where('color','!=','default')->get()->toArray();
        // $color = Color::where('product_id',$id)->where('color','!=','default')->get();
        // dd($color['1']->product);
        // dd($color);
        $product['quantity'] = (int)$request->quantity;
        $product['size'] = $size;
        $product['color'] = $color;
        // dd($product);
        session()->push('cartinfo', $product);
        // session()->push('imgcolor', $color);
        // session(['size' => $size]);
        // session(['color' => $color]);
        // session(['quantity' => $quantity]);
        // session()->push('size',$size);
        // session()->push('color',$color);
        // session()->push('quantity',$quantity);
        // dd($quantity);

        // session()->push('size');
        // session()->push('item_ids', 'item3');
        // Session::put('cartinfo', $product);
        // dd($product);
        Alert::success('Add Product To Cart', 'Successfully added');
        return redirect()->route('user.homepage');
    }

    public function allcart(){
        $cartProducts = session('cartinfo');
        // dd(session('size'));
        // $size = session('size');
        // $color = session('color');
        // if(session()->has('quantity'))
        // {
        //     array_push($quantity,session('quantity'));
        // }
        // else{
        //     $quantity = array(session('quantity'));
        // }
        // dd($quantity);
        // dd($quantity);
        // $images = session('imgcolor');
        // dd($images);
        // return view('product.carts',compact('cartProducts'));
        // return view('cart',compact('cartProducts','images'));
        // return view('cart',compact('cartProducts','size','color','quantity'));
        return view('cart',compact('cartProducts'));
    }

    public function removecart($index){
        // dd($index);
        // remove array index
        // unset($array[1]);
        $cartProducts = session('cartinfo');
        $array_index = array_keys($cartProducts)[$index];
        // dd($array_index);
        // dd($cartProducts[$array_index]);
        unset($cartProducts[$array_index]);
        Session::put('cartinfo', $cartProducts);
        // dd($items);
        return redirect()->route('allcart');
        // return view('product.carts',compact('items'));
    }

    public function checkout(){

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
