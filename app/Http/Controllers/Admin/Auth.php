<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    //
    public function login_now(Request $request){
        $username = strtolower($request->username);
        $password = sha1(strtolower($request->password));

        // get admin dt
        $dt = DB::select('SELECT * from admins where a_username = ? AND a_password', [$username, $password]);
        if( count($dt) == 0){
            return view('admin.unauth.login')->with('message', 'account not found');
        }

        // account found, so register data and re-direct
        // $_COOKIE[sha1('is_admin_signed_in_bidemi_project')
        setcookie(sha1('is_admin_signed_in_bidemi_project'), md5('true'), intval(time() + 365 * (86400 * 30)), "/");
        setcookie(sha1('id_for_admin_signed_in_bidemi_project'), base64_encode($dt[0]->a_id), intval(time() + 365 * (86400 * 30)), "/");

        return redirect(url('admin/'));

    }
}
