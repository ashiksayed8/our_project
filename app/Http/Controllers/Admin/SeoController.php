<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SeoController extends Controller
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

    public function SeoShow() {

        $seo=DB::table('seo')->first();
        return view('admin.setting_section.seo',compact('seo'));
    }

    public function SeoUpdate(Request $request ,$id) {

        $id=$request->id;
        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_description']=$request->meta_description;
        $data['google_analytics']=$request->google_analytics;
        $data['bing_analytics']=$request->bing_analytics;
        DB::table('seo')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'SEO Updated',
            'alert-type'=>'success'
                  );
        return Redirect()->back()->with($notification);

    }
}
