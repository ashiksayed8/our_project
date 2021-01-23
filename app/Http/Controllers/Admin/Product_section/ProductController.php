<?php

namespace App\Http\Controllers\Admin\Product_section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

    	$product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->get();
         return view('admin.product.info_product',compact('product'));
    }


    public function create(){
        
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        return view('admin.product.create_product',compact('category','brand'));

    }

    public function GetSubcat($category_id){
        
        $cat=DB::table('subcategories')->where("category_id",$category_id)->get();
        return json_encode($cat);
    }
    public function InsertProduct(Request $request){
        
        // $validatedData = $request->validate([
        //     'category_id' => 'required',
        //     'subcategory_id' => 'required',
        //     'brand_id' => 'required',
        //     'product_name' => 'required',
        //     'product_code' => 'required',
        //     'product_quantity' => 'required',
        //     'product_details' => 'required',
        //     'product_color' => 'required',
        //     'product_size' => 'required',
        //     ]);

        $data=array();
        $data['category_id']=$request->category_id; 
        $data['subcategory_id']=$request->subcategory_id; 
        $data['brand_id']=$request->brand_id; 
        $data['product_name']=$request->product_name; 
        $data['product_code']=$request->product_code; 
        $data['product_quantity']=$request->product_quantity; 
        $data['product_details']=$request->product_details; 
        $data['product_color']=$request->product_color; 
        $data['product_size']=$request->product_size; 
        $data['selling_price']=$request->selling_price; 
        $data['main_slider']=$request->main_slider; 
        $data['hot_deal']=$request->hot_deal; 
        $data['best_rated']=$request->best_rated; 
        $data['mid_slider']=$request->mid_slider; 
        $data['hot_new']=$request->hot_new; 
        $data['trend']=$request->trend; 
        $data['buyone_getone']=$request->buyone_getone; 
        $data['status']=1;
        $product_image=$request->file('product_image');

       if($product_image){
      
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($product_image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$product_image->move($upload_path,$image_full_name);
            $data['product_image']=$image_url;
            DB::table('products')->insert($data);
            $notification=array(
                    'messege'=>'Successfully Add to product',
                    'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);

        }  
   
    }
   
    public function Inactive($id){

            DB::table('products')->where('id',$id)->update(['status'=>0]);
            $notification=array(
                        'messege'=>'Successfully Inactive to product',
                        'alert-type'=>'warning'
                    );
            return Redirect()->back()->with($notification);
    }

    public function Active($id){

            DB::table('products')->where('id',$id)->update(['status'=>1]);
            $notification=array(
                        'messege'=>'Successfully Active to product',
                        'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);
    }

    public function DeleteProduct($id){

        $product=DB::table('products')->where('id',$id)->first();
        $product_image=$product->product_image;
        unlink($product_image);
        DB::table('products')->where('id',$id)->delete();

        $notification=array(
                     'messege'=>'Successfully Delte to product',
                     'alert-type'=>'error'
                 );
         return Redirect()->back()->with($notification);
    }

    public function EditProduct($id){

        $product=DB::table('products')
           ->where('id',$id)
           ->first();
           return view('admin.product.edit_product',compact('product'));
       }

    public function UpdateProduct(Request $request,$id){
        
        $data=array();
        $data['category_id']=$request->category_id; 
        $data['subcategory_id']=$request->subcategory_id; 
        $data['brand_id']=$request->brand_id; 
        $data['product_name']=$request->product_name; 
        $data['product_code']=$request->product_code; 
        $data['product_quantity']=$request->product_quantity; 
        $data['product_details']=$request->product_details; 
        $data['product_color']=$request->product_color; 
        $data['product_size']=$request->product_size; 
        $data['selling_price']=$request->selling_price; 
        $data['main_slider']=$request->main_slider; 
        $data['hot_deal']=$request->hot_deal; 
        $data['best_rated']=$request->best_rated; 
        $data['mid_slider']=$request->mid_slider; 
        $data['hot_new']=$request->hot_new; 
        $data['trend']=$request->trend; 
        $data['buyone_getone']=$request->buyone_getone; 
        $data['discount_price']=$request->discount_price;
        $product_image=$request->file('product_image');
        $old_image=$request->old_image;

       if($product_image){
            unlink($old_image);
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($product_image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$product_image->move($upload_path,$image_full_name);
            $data['product_image']=$image_url;
            $update=DB::table('products')->where('id',$id)->update($data);
            
            $notification=array(
                    'messege'=>'Successfully Update to product',
                    'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
               
            } else {
                $update=DB::table('products')->where('id',$id)->update($data);
                $notification=array(
                    'messege'=>'Successfully Update without pic to product',
                    'alert-type'=>'warning'
                );
                return Redirect()->back()->with($notification);
            }       
    }

    public function ViewProduct($id){

        $product=DB::table('products')
           ->join('categories','products.category_id','categories.id')
           ->join('brands','products.brand_id','brands.id')
           ->join('subcategories','products.subcategory_id','subcategories.id')
           ->select('products.*','categories.category_name','brands.brand_name','subcategories.subcategory_name')
           ->where('products.id',$id)
           ->first();
           return view('admin.product.show_product',compact('product'));
       }
}
