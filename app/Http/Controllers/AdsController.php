<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use DB;
use Image;
use File;
use Alert;
class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $ads = Ads::where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('id','like','%'.$keyword.'%')
                            ->orWhere('name','like','%'.$keyword.'%')
                            ->orWhere('start_date','like','%'.$keyword.'%')
                            ->orWhere('end_date','like','%'.$keyword.'%')
                            ->orderBy('id', 'asc')
                            // ->orWhere('created_at','like','%'.$keyword.'%')
                            // ->orWhere('updated_at','like','%'.$keyword.'%')
            ->paginate(5);
        $ads->withPath('ads');
        $ads->appends($request->all());
        if ($request->ajax()) {
            return \Response::json(\View::make('product_list', array('ads' => $ads))->render());
        }
        // $ads = Ads::all();
        return view('admin.ads.index',compact('ads','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            //decimal with 2 digits floating point
            'start_date' => 'required|date_format:Y/m/d',
            'end_date' => 'required|date_format:Y/m/d',
        ]);
        $ads = new Ads;
        // store and resize image to folder uploads/product_image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('uploads\ads\\' . $filename ) );
            $ads->image = $filename;
            // $ads->save();
        };
        $ads->name = $request->input('name');
        $ads->start_date = $request->input('start_date');
        $ads->end_date = $request->input('end_date');
        $ads->save();
        Alert::success('Ads Creation', 'Successfully Created');
        // return redirect()->route('ads.index')->withStatus(__('Product successfully created.'));
        return redirect()->route('ads.index');
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
        $ad = Ads::findOrFail($id);
        return view('admin.ads.edit',compact('ad'));
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
        $ads = Ads::findOrFail($id);
        $this-> validate($request,[
            'imgDB' => '',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            //decimal with 2 digits floating point
            'start_date' => 'required|date_format:Y/m/d',
            'end_date' => 'required|date_format:Y/m/d',
        ]);
        // store and resize image to folder uploads/product_image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('uploads\ads\\' . $filename ) );
            $ads->image = $filename;
            // $ads->save();
        }
        else{
            $ads->image = $request->input('imgDB');
        };
        $ads->name = $request->input('name');
        $ads->start_date = $request->input('start_date');
        $ads->end_date = $request->input('end_date');
        $ads->save();
        Alert::success('Ads Creation', 'Successfully Created');
        // return redirect()->route('ads.index')->withStatus(__('Product successfully created.'));
        return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::findOrFail($id);
        $image_path = $ads->image;
        File::delete(public_path('uploads\ads\\' . $image_path));
        $ads->delete();
        Alert::success('Ads Delete', 'Successfully Deleted');
        // return redirect()->route('ads.index');
    }
}
