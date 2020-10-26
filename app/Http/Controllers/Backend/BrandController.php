<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Model\Brand;
use Auth;
class BrandController extends Controller
{
    //view brand method
    public function view ()
    {
        $brand = Brand::all();
        return view('backend.brand.view-brand',compact('brand'));
    }
    //add brand interface method
    public function add()
    {
        return view('backend.brand.add-brand');
    }
    //store brand method
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|unique:brands,name'
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->created_by = Auth::user()->id;
        $add_brand = $brand->save();
        if($add_brand){
            $notification=array(
                'message'=>'Successfully Add Brand',
                'alert-type'=>'success'
            );
            return redirect()->route('brand.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('brand.view')->with($notification);
        }
    }
    // edit brand method
    public function edit($id)
    {
        $editData = Brand::find($id);
        return view('backend.brand.edit-brand',compact('editData'));
    }
    //update brand method
    public function update (BrandRequest $request,$id)
    {
        $cate = Brand::find($id);
        $cate->name = $request->name;
        $cate->updated_by = Auth::user()->id;
        $cate_update = $cate->save();
        if($cate_update){
            $notification=array(
                'message'=>'Successfully Update Category',
                'alert-type'=>'success'
            );
            return redirect()->route('brand.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('brand.view')->with($notification);
        }
    }
    //delete brand method
    public function delete(Request $request)
    {
        $brand = Brand::find($request->id);
        // dd($cate);
        $del = $brand->delete(); 
        if($del){
            $notification=array(
                'message'=>'Successfully Delete Brand',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->back()->with($notification);
        }
    }
}
