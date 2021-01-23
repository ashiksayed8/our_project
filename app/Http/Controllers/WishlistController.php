<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Http\RedirectResponse;

class WishlistController extends Controller
{
    public function Addwishlist($id) {

        $userid=Auth::id();
        $check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

        $data = array(
            'user_id'=>$userid,
            'product_id'=>$id
        );

        if(Auth::check()) {
            if($check) {
               return response()->json(['error' => 'Product Already has on your wistlist']);
            }else {
                DB::table('wishlists')->insert($data);
                return response()->json(['error' => 'Successfully Added on your wishlist']);
            }
        }else{
            return response()->json(['error' => 'At first login your account']);
        }     
    }
}
