<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    //

    public function home(){
        return view('admin.auth.Dashboard');
    }

    public function add_faculty(){
        return view('admin.auth.faculty.add');
    }

    public function add_faculty_now(Request $request){
        $f_name = $request->f_name;

        DB::insert('INSERT INTO faculty(f_name) VALUES(?)', [$f_name]);

        return redirect('/admin/view-faculty');
    }

    public function view_faculty(){
        $sql = DB::select('SELECT * from faculty ORDER BY f_id', []);

        return view('admin.auth.faculty.view')->with('data', ['_data' => $sql]);
    }

    public function add_department(){
        $sql = DB::select('SELECT * from faculty ORDER BY f_id', []);
        return view('admin.auth.department.add')->with('data', ['_data' => $sql]);
    }

    public function add_department_now(Request $request){
        $f_name = $request->f_name;
        $d_name = $request->d_name;

        DB::insert('INSERT INTO department(d_name, f_name) VALUES(?, ?)', [$d_name, $f_name]);

        return redirect('/admin/view-department');
    }

    public function view_department(){
        $sql = DB::select('SELECT * from department ORDER BY d_id, f_name DESC', []);
        return view('admin.auth.department.view')->with('data', ['_data' => $sql]);
    }

    public function add_students(){
        return view('admin.auth.student.add');
    }

    public function add_students_now(Request $request){
        $matric = strtolower($request->matric);
        $password = sha1(strtolower($request->password));

        DB::insert('INSERT into users (matric_numb, password, status) values (?, ?, ?)', [$matric, $password, 1]);

        return redirect('/admin/view-students');
    }

    public function view_students(){
        $sql = DB::select('SELECT * from users ORDER BY u_id DESC', []);
        return view('admin.auth.student.view')->with('data', ['_data' => $sql]);
    }
}
