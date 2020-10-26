<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Size;
use App\Http\Requests\SizeRequest;
use Auth;

class SizeController extends Controller
{
    //view size method
    public function view ()
    {
        $size = Size::all();
        return view('backend.size.view-size',compact('size'));
    }
    //add size interface method
    public function add()
    {
        return view('backend.size.add-size');
    }
    //store size method
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|unique:sizes,name'
        ]);
        $size = new Size();
        $size->name = $request->name;
        $size->created_by = Auth::user()->id;
        $add_size = $size->save();
        if($add_size){
            $notification=array(
                'message'=>'Successfully Add Size',
                'alert-type'=>'success'
            );
            return redirect()->route('size.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('size.view')->with($notification);
        }
    }
    //edit size method
    public function edit($id)
    {
        $editData = Size::find($id);
        return view('backend.size.edit-size',compact('editData'));
    }
    //update size method
    public function update (SizeRequest $request,$id)
    {
        $size = Size::find($id);
        $size->name = $request->name;
        $size->updated_by = Auth::user()->id;
        $size_update = $size->save();
        if($size_update){
            $notification=array(
                'message'=>'Successfully Update Size',
                'alert-type'=>'success'
            );
            return redirect()->route('size.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('size.view')->with($notification);
        }
    }
    //delete size method
    public function delete(Request $request)
    {
        $size = Size::find($request->id);
        // dd($cate);
        $del = $size->delete(); 
        if($del){
            $notification=array(
                'message'=>'Successfully Delete Size',
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
