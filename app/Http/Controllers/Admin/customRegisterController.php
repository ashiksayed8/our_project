<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Hash;

class customRegisterController extends Controller
{
    public function _construct() {
        $this->middleware('guest');
    }

    public function RegisterForm() {
        return view('admin.register');
    }

    public function Register(Request $r) {
        //$r->all();
        $this->validate($r,[
            'name'=>'required|max:50|min:2',
            'email'=>'required|email|max:100',
            'password'=>'required|min:8|confirmed'
        ]);

        $register = new Admin;
        $register->name = $r->name;
        $register->email = $r->email;
        $register->password = Hash::make($r->password) ;
        $register->save();
        
    }
}
