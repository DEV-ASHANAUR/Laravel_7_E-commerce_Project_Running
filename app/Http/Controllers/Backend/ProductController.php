<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Model\Product;
use App\Model\Categories;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Manufacture;
use App\Model\Size;
use DB;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        $alldata = Product::all();
        return view('backend.product.view-product',compact('alldata'));
    }
    public function create()
    {
        $data['category'] = Categories::all();
        $data['brand'] = Brand::all();
        $data['color'] = Color::all();
        $data['manufacture'] = Manufacture::all();
        $data['size'] = Size::all();
        return view('backend.product.create-product',$data);
    }
    public function store(Request $request)
    {
        //dd($request->all());
        DB::transaction(function () use($request){
            $this->validate($request,[
                'name'=> 'required|unique:products,name'
            ]);
            $product = new Product();
            $product->cat_id = $request->category;
            $product->brand_id = $request->brand;
            $product->name = $request->name;
            $product->manufacture_id = $request->manufacture;
            $product->slug = Str::slug($request->name);
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->discount = $request->discount;
            $product->dis_price = $request->dis_price;
            $product->long_desc = $request->description;
            $img = $request->file('image');
            if($img){
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move(public_path('upload/product_image'),$imgName);
                $product['image'] = $imgName;
            }    
            if($product->save()){
                //product sub image upload
                $files = $request->sub_image;
                if(!empty($files)){
                    foreach($files as $file){
                        $imgName = date('YmdHi').$file->getClientOriginalName();
                        $file->move(public_path('upload/product_sub_image'),$imgName);
                        $sub_image['sub_image'] = $imgName;
                        $sub_image = new ProductSubImage();
                        $sub_image->product_id = $product->id;
                        $sub_image->sub_image = $imgName;
                        $sub_image->save();
                    }
                }
                //color table data insert
                $color = $request->color;
                if(!empty($color)){
                    foreach($color as $color){
                        $pcolor = new ProductColor();
                        $pcolor->color_id = $color;
                        $pcolor->product_id = $product->id;
                        $pcolor->save();
                    }
                }
                //size table data insert
                $size = $request->size;
                if(!empty($size)){
                    foreach($size as $size){
                        $psize = new ProductSize();
                        $psize->size_id = $size;
                        $psize->product_id = $product->id;
                        $psize->save();
                    }
                }
            }else{
                $notification=array(
                    'message'=>'Something went worng!',
                    'alert-type'=>'error'
                );
                //return Redirect()->back()->with($notification);
                return redirect()->back()->with($notification);
            }
        });
        $notification=array(
            'message'=>'Successfully Save Product',
            'alert-type'=>'success'
        );
        return redirect()->route('product.view')->with($notification);
        
    }
    //product show method
    public function show($id)
    {
        $product = Product::find($id);
        // dd($product);
        $color = ProductColor::where('product_id',$id)->get();
        $size = ProductSize::where('product_id',$id)->get();
        $sub_image = ProductSubImage::where('product_id',$id)->get();
        //dd($sub_image);
        return view('backend.product.show-product',compact('product','color','size','sub_image'));
    }
    //product Edit
    public function edit($id)
    {
        $data['editdata'] = Product::find($id);
        $data['category'] = Categories::all();
        $data['brand'] = Brand::all();
        $data['color'] = Color::all();
        $data['manufacture'] = Manufacture::all();
        $data['size'] = Size::all();
        $data['sub_image'] = ProductSubImage::where('product_id',$id)->get();
        $data['color_array'] = ProductColor::select('color_id')->where('product_id',$id)->orderBy('id','ASC')->get()->toArray();
        $data['size_array'] = ProductSize::select('size_id')->where('product_id',$id)->orderBy('id','ASC')->get()->toArray();
        //dd($size_array);
        return view('backend.product.edit-product',$data);
    }
    //product update method
    public function update(ProductRequest $request,$id)
    {
        DB::transaction(function () use($request,$id){
            $product = Product::find($id);
            $product->cat_id = $request->category;
            $product->brand_id = $request->brand;
            $product->name = $request->name;
            $product->manufacture_id = $request->manufacture;
            $product->slug = Str::slug($request->name);
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->discount = $request->discount;
            $product->dis_price = $request->dis_price;
            $product->long_desc = $request->description;
            $img = $request->file('image');
            if($img){
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move(public_path('upload/product_image'),$imgName);
                if(file_exists('upload/product_image/'.$product->image) AND !empty($product->image)){
                    @unlink(public_path('upload/product_image/'.$product->image));
                }
                $product['image'] = $imgName;
            }    
            if($product->save()){
                //product sub image update
                $files = $request->sub_image;
                if(!empty($files)){
                    $sub_image = ProductSubImage::where('product_id',$id)->get()->toArray();
                    foreach($sub_image as $value){
                        if(!empty($value)){
                            @unlink(public_path('upload/product_sub_image/'.$value['sub_image']));
                        }
                    }
                    ProductSubImage::where('product_id',$id)->delete();

                }
                if(!empty($files)){
                    foreach($files as $file){
                        $imgName = date('YmdHi').$file->getClientOriginalName();
                        $file->move(public_path('upload/product_sub_image'),$imgName);
                        $sub_image['sub_image'] = $imgName;
                        $sub_image = new ProductSubImage();
                        $sub_image->product_id = $product->id;
                        $sub_image->sub_image = $imgName;
                        $sub_image->save();
                    }
                }
                //color table data update
                $color = $request->color;
                if(!empty($color)){
                    ProductColor::where('product_id',$id)->delete();
                }
                if(!empty($color)){
                    foreach($color as $color){
                        $pcolor = new ProductColor();
                        $pcolor->color_id = $color;
                        $pcolor->product_id = $product->id;
                        $pcolor->save();
                    }
                }
                //size table data update
                $size = $request->size;
                if(!empty($size)){
                    ProductSize::where('product_id',$id)->delete();
                }
                if(!empty($size)){
                    foreach($size as $size){
                        $psize = new ProductSize();
                        $psize->size_id = $size;
                        $psize->product_id = $product->id;
                        $psize->save();
                    }
                }
            }else{
                $notification=array(
                    'message'=>'Something went worng!',
                    'alert-type'=>'error'
                );
                //return Redirect()->back()->with($notification);
                return redirect()->back()->with($notification);
            }
        });
        $notification=array(
            'message'=>'Successfully Update Product',
            'alert-type'=>'success'
        );
        return redirect()->route('product.view')->with($notification);
    }
    //product delete method
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        if(file_exists('upload/product_image/'.$product->image) AND !empty($product->image)){
            @unlink(public_path('upload/product_image/'.$product->image));
        }
        $sub_image = ProductSubImage::where('product_id',$product->id)->get()->toArray();
        foreach($sub_image as $value){
            if(!empty($value)){
                @unlink(public_path('upload/product_sub_image/'.$value['sub_image']));
            }
        }
        ProductSubImage::where('product_id',$product->id)->delete();
        ProductColor::where('product_id',$product->id)->delete();
        ProductSize::where('product_id',$product->id)->delete();
        $product->delete();
        $notification=array(
            'message'=>'Successfully Delete Product',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

}
