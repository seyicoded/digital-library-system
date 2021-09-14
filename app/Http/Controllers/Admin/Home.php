<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;
use JD\Cloudder\Facades\Cloudder;

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

    public function view_pending_students(){
        $sql = DB::select('SELECT * from users WHERE status = ? ORDER BY u_id DESC', [0]);
        return view('admin.auth.student.view_pending')->with('data', ['_data' => $sql]);
    }

    public function approve_student(Request $request){
        $u_id = $request->u_id;
        DB::update('UPDATE users set status = 1 where u_id = ?', [$u_id]);
        return back();
    }

    public function decline_student(Request $request){
        $u_id = $request->u_id;
        DB::update('UPDATE users set status = 2 where u_id = ?', [$u_id]);
        return back();
    }

    public function add_books(){
        $sql = DB::select('SELECT * from faculty ORDER BY f_id DESC', []);
        return view('admin.auth.books.add')->with('data', ['_data' => $sql]);
    }

    public function get_department(Request $request){
        $f_name = $request->f_name;

        $sql = DB::select('SELECT * from department WHERE f_name = ?', [$f_name]);
        $s = '';
        foreach ($sql as $dt) {
            $s = $s . "<option value='".$dt->d_name."'>".$dt->d_name."</option>";
        }

        return $s;
    }

    public function add_books_now(Request $request){
        Cloudder::upload($request->file('file'));
        $cloundary_upload = Cloudder::getResult();
        $url = $cloundary_upload['url'];

        $f_name = $request->f_name;
        $d_name = $request->d_name;
        $b_name = $request->b_name;
        $b_author = $request->b_author;

        // insert
        DB::insert('INSERT into books (f_name, d_name, b_name, b_author, b_path) values (?, ?, ?, ?, ?)', [$f_name, $d_name, $b_name, $b_author, $url]);

        return redirect('/admin/view-books');
    }

    public function view_books(){
        $sql = DB::select('SELECT * from books ORDER BY b_id DESC', []);
        return view('admin.auth.books.view')->with('data', ['_data' => $sql]);
    }

    public function add_publication(){
        return view('admin.auth.publication.add');
    }

    public function add_publication_now(Request $request){
        $p_name = $request->p_name;
        $p_content = $request->p_content;

        DB::insert('INSERT into publication (p_title, p_content) values (?, ?)', [$p_name, $p_content]);

        return redirect('/admin/view-publication');
    }

    public function view_publication(){
        $sql = DB::select('SELECT * from publication ORDER BY p_id DESC', []);
        return view('admin.auth.publication.view')->with('data', ['_data' => $sql]);
    }
}

