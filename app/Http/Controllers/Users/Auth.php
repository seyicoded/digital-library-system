<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    //
    public function register_user(Request $request){
        // initialize
        $matric = strtolower($request->matric);
        $password = sha1(strtolower($request->password));
        // check if user exist
        if( count(DB::select('SELECT * from users where matric_numb = ?', [$matric])) != 0 ){
            return view('user.unauth.index')->with('registration_message', 'user already exist');
        }

        // insert into db
        if( DB::insert('INSERT into users (matric_numb, password, status) values (?, ?, ?)', [$matric, $password, 0]) ){
            return view('user.unauth.index')->with('registration_message', 'account created but pending validation, should be up with 24 hours or contact admin');
        }else{
            return view('user.unauth.index')->with('registration_message', 'try again later');
        }

    }
}
