<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Alert;
use View;
use Response;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $categories = Categories::where('category_name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('id','like','%'.$keyword.'%')
                            ->orWhere('parent_id','like','%'.$keyword.'%')
                            ->paginate(5);
        $categories->withPath('categories');
        $categories->appends($request->all());
        if ($request->ajax()) {
            return Response::json(View::make('list', array('categories' => $categories))->render());
        }
        return view('admin.categories.index',compact('categories', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.categories.create',compact('categories'));
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
            'category_name' => 'required',
            //decimal with 2 digits floating point
            'parent_id' => '',
        ]);
        $categories = new categories;
        $categories->category_name = $request->input('category_name');
        $categories->parent_id = $request->input('parent_id');
        // dd($categories);
        $categories->save();
        Alert::success('Category Creation', 'Successfully Created');
        // return redirect()->route('categories.index')->withStatus(__('Product successfully created.'));
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $category = Categories::findOrFail($id);
        $categories = Categories::all();
        $categoryParentNull = DB::table('categories')->whereNull('parent_id')->get();
        return view('admin.categories.edit',compact('category','categories','categoryParentNull'));
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
        $this-> validate($request,[
            'category_name' => 'required',
            'parent_id' => '',
        ]);
        $categories = Categories::findOrFail($id);
        $categories->category_name = $request->input('category_name');
        $categories->parent_id = $request->input('parent_id');
        // dd($categories);
        $categories->save();
        Alert::success('Category Update', 'Successfully Updated');
        // return redirect()->route('categories.index')->withStatus(__('Product successfully created.'));
        return redirect()->route('categories.index');
        // return view('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        if($category->status === 1){
            $category->status = 0;
        }
        elseif($category->status === 0){
            $category->status = 1;
        }
        $category->save();
    }
}
