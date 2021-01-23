<?php

namespace App\Http\Controllers\Admin\Product_section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Notifications\Notifiable;

class CategoryController extends Controller
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

    public function category(){

        $category=DB::table('categories')->get();
        return view('admin.category.add_category',compact('category'));
        
    }

    public function insertcategory(Request $request){

       $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:100',
       ]);
    
       $data=array();
       $data['category_name']=$request->category_name;
       DB::table('categories')->insert($data);

       $notification=array(
           'messege'=>'Successfully Add to Category',
           'alert-type'=>'success'
       );
       return Redirect()->back()->with($notification);

    }

    public function DeleteCategory($id){

        DB::table('categories')->where('id',$id)->delete();
       
        $notification=array(
            'messege'=>'Category Delete Successfully ',
            'alert-type'=>'warning'
        );
        return Redirect()->back()->with($notification);
        
    }

    public function EditCategory($id){

        $category=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit_category',compact('category'));

    }
    public function UpdateCategory(Request $request,$id)
    {
        $validatedData = $request->validate([
        'category_name' => 'required|max:55',
        ]);

         $data=array();
         $data['category_name']=$request->category_name;
         $update= DB::table('categories')->where('id',$id)->update($data);

        if($update) {
            $notification=array(
                'messege'=>'Category Update Successfully ',
                'alert-type'=>'success'
            );
            return Redirect()->route('categories')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Category Do Not Update ',
                'alert-type'=>'success'
            );
            return Redirect()->route('categories');
        }
    }
}
