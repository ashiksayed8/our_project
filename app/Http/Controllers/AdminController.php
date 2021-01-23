<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;

class AdminController extends Controller
{
    public  function __construct() {
        $this->middleware('auth:admin');
    }
   


    public function index() {
        return view('Admin.home');
    }

    public function logout(){
        Auth::logout();
        return Redirect()->route('admin.login');
    }
    
}
