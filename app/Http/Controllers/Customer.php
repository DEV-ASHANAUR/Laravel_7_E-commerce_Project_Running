<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use DB;
use Auth;

class Customer extends Controller
{
    //view customer
    public function view()
    {
        $customer = User::where('usertype','customer')->where('status','1')->get();
        return view('backend.customer.view-customer',compact('customer'));
    }
    //draf customer
    public function draf()
    {
        $customer = User::where('usertype','customer')->where('status','0')->get();
        return view('backend.customer.draf-customer',compact('customer'));
    }
    //login
    public function login()
    {
        if(Auth::user()->id !=null){
            return redirect()->route('login');
        }else{
            return view('website.cus_login');
        }
        
    }
    //registation
    public function reg()
    {
        return view('website.cus_reg');
    }
    //registation store
    public function regstore(Request $request)
    {
        DB::transaction(function () use($request) {
            $this->validate($request,[
                'name'=> 'required',
                'email'=> 'required|unique:users,email',
                'mobile' => ['required','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation','password_confirmation' => 'min:6'
            ]);
            $code = rand(0000,9999);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($request->password);
            $user->code = $code;
            $user->usertype = 'customer';
            $user->status = '0';
            $user->save();
            $data = array(
                'email' => $request->email,
                'code' => $code
            );

            Mail::send('website.verify-email', $data, function ($message) use($data) {
                $message->from('eshop@gmail.com', 'Customer Verification');
                $message->to($data['email']);
                $message->subject('Please Verify Your Email Address');
            });
        });
        $notification=array(
            'message'=>'Successfully Sign Up.Pelase Verify Your Email',
            'alert-type'=>'success'
        );
        return redirect()->route('email.verify')->with($notification);
    }
    //email verify
    public function emailverify()
    {
        return view('website.verify');
    }
    //email check
    public function verifyCheck(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'code' => 'required'
        ]); 
        $checkData = User::where('email',$request->email)->where('code',$request->code)->first();
        if($checkData){
            $checkData->status = '1';
            $checkData->save();
            $notification=array(
                'message'=>'Verification  Successfully Done! Please Login!',
                'alert-type'=>'success'
            );
            return redirect()->route('customer.login')->with($notification);
        }else{
            $notification=array(
                'message'=>'Error, Sorry Your Email And Verification Code Does Not Match!',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

}
