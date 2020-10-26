<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Color;
use App\Http\Requests\ColorRequest;
use Auth;

class ColorController extends Controller
{
    //view color method
    public function view ()
    {
        $color = Color::all();
        return view('backend.color.view-color',compact('color'));
    }
    //add color interface method
    public function add()
    {
        return view('backend.color.add-color');
    }
    //store color method
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|unique:colors,name'
        ]);
        $color = new Color();
        $color->name = $request->name;
        $color->created_by = Auth::user()->id;
        $add_color = $color->save();
        if($add_color){
            $notification=array(
                'message'=>'Successfully Add Color',
                'alert-type'=>'success'
            );
            return redirect()->route('color.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('color.view')->with($notification);
        }
    }
    //edit color method
    public function edit($id)
    {
        $editData = Color::find($id);
        return view('backend.color.edit-color',compact('editData'));
    }
    //update color method
    public function update (ColorRequest $request,$id)
    {
        $color = Color::find($id);
        $color->name = $request->name;
        $color->updated_by = Auth::user()->id;
        $color_update = $color->save();
        if($color_update){
            $notification=array(
                'message'=>'Successfully Update Category',
                'alert-type'=>'success'
            );
            return redirect()->route('color.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('color.view')->with($notification);
        }
    }
    //delete color method
    public function delete(Request $request)
    {
        $color = Color::find($request->id);
        // dd($cate);
        $del = $color->delete(); 
        if($del){
            $notification=array(
                'message'=>'Successfully Delete Color',
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
