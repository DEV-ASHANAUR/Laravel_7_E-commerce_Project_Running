<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Size;
use App\Model\Color;
use Cart;

class CartController extends Controller
{
    public function addcart(Request $request)
    {
        $this->validate($request,[
            'size_id' => 'required',
            'color_id' => 'required'
        ]);
        //dd($request->all());
        $product = Product::where('id',$request->product_id)->first();
        $product_size = Size::where('id',$request->size_id)->first();
        $product_color = Color::where('id',$request->color_id)->first();
        //dd($product_size);
        Cart::add([
            'id' =>$product->id,
            'qty' => $request->qty,
            'price' => $request->price,
            'name' => $product->name,
            'weight' =>550,
            'options' =>[
                'size_id' => $request->size_id,
                'size_name' => $product_size->name,
                'color_id' => $request->color_id,
                'color_name' => $product_color->name,
                'image' => $product->image
            ],  
        ]);
        $notification=array(
            'message'=>'Successfully Add To Cart',
            'alert-type'=>'success'
        );
        return redirect()->route('website.cart')->with($notification);
        
    }
    public function upcart(Request $request)
    {
        Cart::update($request->rowid,$request->qty);
        $notification=array(
            'message'=>'Successfully Update Cart',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function removecart($rowId)
    {
        Cart::remove($rowId);
        $notification=array(
            'message'=>'Successfully Remove Cart Item',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
