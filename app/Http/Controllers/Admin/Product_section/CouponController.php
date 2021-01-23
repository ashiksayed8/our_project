<?php

namespace App\Http\Controllers\Admin\Product_section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupon(){

        $coupon=DB::table('coupons')->get();
    	return view('admin.coupon.add_coupon',compact('coupon'));
    }

    public function InsertCoupon(Request $request){

        $validatedData = $request->validate([
        'coupon_name' => 'required|unique:coupons|max:100',
        
       ]);
    
        $data=array();
        $data['coupon_name']=$request->coupon_name;
        $data['coupon_discount']=$request->coupon_discount;
        DB::table('coupons')->insert($data);
        return Redirect()->back();

    }

    public function DeleteCoupon($id){

        DB::table('coupons')->where('id',$id)->delete();
        return Redirect()->back();
    }

    public function EditCoupon($id){
        $coupon=DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.edit_coupon',compact('coupon'));

    }
  public function UpdateCoupon(Request $request,$id){


        $data=array();
        $data['coupon_name']=$request->coupon_name;
        $data['coupon_discount']=$request->coupon_discount;
        $update=DB::table('coupons')->where('id',$id)->update($data);
  
        if ($update) {
         
            return Redirect()->route('coupons');
        }else{
           
            return Redirect()->route('coupons');
        }
    }
}
