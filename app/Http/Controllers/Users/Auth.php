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

    public function login_user(Request $request){
        $matric = strtolower($request->matric);
        $password = sha1(strtolower($request->password));

        $db = DB::select('SELECT * from users where matric_numb = ? AND password = ?', [$matric, $password]);
        if( count($db) == 0 ){
            return view('user.unauth.index')->with('login_message', 'account not found');
        }

        setcookie(sha1('is_user_signed_in_bidemi_project'), md5('true'), intval(time() + 365 * (86400 * 30)), "/");
        setcookie(sha1('id_for_user_signed_in_bidemi_project'), base64_encode($db[0]->u_id), intval(time() + 365 * (86400 * 30)), "/");
        setcookie(sha1('matric_for_user_signed_in_bidemi_project'), base64_encode($matric), intval(time() + 365 * (86400 * 30)), "/");

        return redirect('/home');
    }
}
