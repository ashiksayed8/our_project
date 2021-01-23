<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class ProductController extends Controller
{
    public function ProductView($id,$product_name)
    {
    	$product=DB::table('products')
    	->join('categories','products.category_id','categories.id')
    	->join('subcategories','products.subcategory_id','subcategories.id')
    	->join('brands','products.brand_id','brands.id')
    	->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')->where('products.id',$id)->first();
       return  view('front_view.product_details',compact('product'));
    }

    public function AddCart($id)
    {    
        $product=DB::table('products')->where('id', $id)->first();
        $data=array();
        if ($product->discount_price==null) {
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']=$product->selling_price;
            $data['weight']=1;
            $data['options']['image']=$product->product_image;
            $data['options']['color']='product_color';
            $data['options']['size']='product_size';
            Cart::add($data);
            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
              );
            return Redirect()->to('/')->with($notification);
        } else {
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']=$product->discount_price;
            $data['weight']=1;
            $data['options']['image']=$product->product_image;
            $data['options']['color']='product_color';
            $data['options']['size']='product_size';

            Cart::add($data);
            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
              );
            return Redirect()->to('/')->with($notification);
        }
    	
     }

    // public function productsView($id)
    // {
    //      $products=DB::table('products')->where('subcategory_id',$id)->paginate(30);
    //      $brands= DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();
         
    //      return view('pages.all_products',compact('products','brands'));
    // }

}
