<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManufacturesRequest;
use App\Model\Manufacture;
use Auth;

class Manufactures extends Controller
{
    //view manufacture method
    public function view ()
    {
        $manufacture = Manufacture::all();
        return view('backend.manufacture.view-manufacture',compact('manufacture'));
    }
    //add manufacture interface method
    public function add()
    {
        return view('backend.manufacture.add-manufacture');
    }
    //store manufacture method
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|unique:manufactures,name'
        ]);
        $manufacture = new Manufacture();
        $manufacture->name = $request->name;
        $manufacture->created_by = Auth::user()->id;
        $add_manufacture = $manufacture->save();
        if($add_manufacture){
            $notification=array(
                'message'=>'Successfully Add Manufacture',
                'alert-type'=>'success'
            );
            return redirect()->route('manufacture.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('manufacture.view')->with($notification);
        }
    }
    //edit manufacture method
    public function edit($id)
    {
        $editData = Manufacture::find($id);
        return view('backend.manufacture.edit-manufacture',compact('editData'));
    }
    //update manufacture method
    public function update (ManufacturesRequest $request,$id)
    {
        $manufacture = Manufacture::find($id);
        $manufacture->name = $request->name;
        $manufacture->updated_by = Auth::user()->id;
        $manufacture_update = $manufacture->save();
        if($manufacture_update){
            $notification=array(
                'message'=>'Successfully Update Manufacture',
                'alert-type'=>'success'
            );
            return redirect()->route('manufacture.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('manufacture.view')->with($notification);
        }
    }
    //delete manufacture method
    public function delete(Request $request)
    {
        $Manufacture = Manufacture::find($request->id);
        // dd($cate);
        $del = $Manufacture->delete(); 
        if($del){
            $notification=array(
                'message'=>'Successfully Delete Manufacture',
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
