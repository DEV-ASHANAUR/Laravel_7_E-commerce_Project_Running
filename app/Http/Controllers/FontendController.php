<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class FontendController extends Controller
{
    public function home()
    {
        return view('website.home');
    }
    public function shop()
    {
        $data = DB::table('products')->join('categories','products.cat_id','categories.id')->select('products.*','categories.name as cat_name')->paginate(6);
        //dd($data);
        $category = DB::table('categories')->orderBy('id','ASC')->get();
        $brand = DB::table('brands')->orderBy('id','ASC')->get();
        //dd($data);
        return view('website.shop',compact('data','category','brand'));
    }
    public function search(Request $request)
    {
       $p_name = $request->product_name;
       
       $data = DB::table('products')->where('name','LIKE',"%{$p_name}%")->paginate(6);
       $category = DB::table('categories')->orderBy('id','ASC')->get();
        $brand = DB::table('brands')->orderBy('id','ASC')->get();
        //dd($data);
        return view('website.shop',compact('data','category','brand'));
    }
    // public function fetch_data(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $data = DB::table('products')->paginate(6);
    //         return view('website.fetch_data',compact('data'))->render();
    //     }
    // }
    // public function filter(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         if(isset($request->id)){
    //             $data = DB::table('products')->where('cat_id',$request->id)->paginate(6);
    //             return view('website.fetch_data',compact('data'))->render();
    //         }
    //     }whereBetween('date',[$sdate,$edate])
    // }
    public function filter(Request $request)
    {
        if($request->ajax())
        {
                $query = DB::table('products');
                if(isset($request->min)){
                //dd($request->min);    
                $query->whereBetween('price',[$request->min,$request->max]);
                }
                //$query->whereIN('cat_id',explode(',' ,$category));
                if(isset($request->cat)){
                    $category = implode(',',$request->cat);
                    $query->whereIN('cat_id',explode(',' ,$category));
                }
                if(isset($request->brand)){
                    $brand = implode(',',$request->brand);
                    $query->whereIN('brand_id',explode(',' ,$brand));
                }
                // if(isset($request->search_val)){
                //     $query->where('name','LIKE',"%{$request->search_val}%");
                // }
                //$query->whereBetween('price',[$request->min,$request->max]);
                // $query->whereIn('cat_id',explode(",", $request->cat));
                //dd($request->cat);
                
                // dd($ex);
                
                //dd($category);
                //return view('website.fetch_data',compact('data'))->render();
                $data = $query->join('categories','products.cat_id','categories.id')->select('products.*','categories.name as cat_name')->paginate(3);
                //dd($data);
            // $data = DB::table('products')->paginate(3);
                return view('website.fetch_data',compact('data'))->render();

            
            //dd($request->cat);
        }
    }
    public function autocomplete(Request $request)
    {
        if($request->ajax()){
           $query = $request->get('query');
           $data = DB::table('products')
                    ->where('name','LIKE',"%{$query}%")->get();
            //dd($data);
            $output = '<ul class="ul-sagetion" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li class="li-field"><a href="#">'.$row->name.'</a></li>';   
            }
            $output .= '</ul>';
            echo $output;
        }

    }
    public function details($slug)
    {
        $data['product'] = Product::where('slug',$slug)->with('category')->first();
        //dd($data);
        $data['size'] = ProductSize::where('product_id',$data['product']->id)->with('size')->get()->toArray();
        $data['color'] = ProductColor::where('product_id',$data['product']->id)->with('color')->get()->toArray();
        $data['subimage'] = ProductSubImage::where('product_id',$data['product']->id)->get();
        //dd($data['size']);
        //dd($data['color']);
        return view('website.details',$data);
    }
    public function cart()
    {
        return view('website.cart');
    }
    public function checkout()
    {
        return view('website.checkout');
    }
}
