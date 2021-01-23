<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use DB;
use Response;
use Auth;
use Session;

class CartController extends Controller
{
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
            $data['options']['color']=$product->product_color;
            $data['options']['size']=$product->product_size;
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
            $data['options']['color']=$product->product_color;
            $data['options']['size']=$product->product_size;

            Cart::add($data);
            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
              );
            return Redirect()->to('/')->with($notification);
        }
    }


    public function check()
    {
        $content=Cart::content();
        return response()->json($content);
    }

    public function showCart()
    {
        $cart=Cart::content();
        return view('front_view.cart', compact('cart'));
    }

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function ViewProduct($id)
    {
        $product=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->join('brands', 'products.brand_id', 'brands.id')->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')->where('products.id', $id)->first();

        $color=$product->product_color;
        $product_color=explode(',', $color);
        $size=$product->product_size;
        $product_size=explode(',', $size);

        return response::json(array('product'=>$product,'color'=>$product_color,'size'=>$product_size));
    }

    public function InsertCart(Request $request)
    {
        $id=$request->product_id;
        $product=DB::table('products')->where('id', $id)->first();
        $data=array();

        if ($product->discount_price==null) {
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$request->qty;
            $data['price']=$product->selling_price;
            $data['weight']=1;
            $data['options']['image']=$product->product_image;
            $data['options']['color']=$request->color;
            $data['options']['size']=$request->size;

            Cart::add($data);
            $notification=array(
                'message'=>'Successfully Done',
                'alert-type'=>'success');

            return Redirect()->back()->with($notification);
        } else {
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$request->qty;
            $data['price']=$product->discount_price;
            $data['weight']=1;
            $data['options']['image']=$product->product_image;
            $data['options']['color']=$request->color;
            $data['options']['size']=$request->size;

            Cart::add($data);
            $notification=array(
                'message'=>'Successfully Done',
                'alert-type'=>'success');

            return Redirect()->back()->with($notification);
        }
    }

    public function Checkout()
    {
        if (Auth::check()) {
            $cart=Cart::content();
            return view('front_view.checkout', compact('cart'));
        } else {
            $notification=array('message'=>'At first login your account','alert-type'=>'success');
            return redirect()->route('login')->with($notification);
        }
    }


    public function Wishlist()
    {
        $userid=Auth::id();
        $product=DB::table('wishlists')->join('products', 'wishlists.product_id', 'products.id')->select('products.*', 'wishlists.user_id')->where('wishlists.user_id', $userid)->get();
        return view('front_view.wishlists', compact('product'));
    }


    public function Coupon(Request $request)
    {
        $coupon_name=$request->coupon_name;
        $check=DB::table('coupons')->where('coupon_name', $coupon_name)->first();
        if ($check) {
                 $var = Cart::subtotal();
                 $var1 = (float) str_replace(',', '', $var);
                 session::put('coupon', [
                'coupon_name' => $check->coupon_name,
                'coupon_discount' => $check->coupon_discount,
                'balance' => $var1 - $check->coupon_discount
                ]);
            $notification=array('message'=>'Successfully coupon applied','alert-type'=>'success');
            return redirect()->back()->with($notification);
        } else {
            $notification=array('message'=>'Invalid Coupon','alert-type'=>'warning');
            return redirect()->back()->with($notification);
        }
    }

    public function CouponRemove()
    {
        session::forget('coupon');
        return redirect()->back();
    }

    public function PymentPage()
    {
        $cart=Cart::content();
        return view('front_view.payment', compact('cart'));
    }
}
