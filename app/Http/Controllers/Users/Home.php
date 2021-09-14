<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    //
    public function home(){
        $public_noti = DB::select('SELECT * from publication ORDER BY p_id DESC', []);
        $books = DB::select('SELECT * from books ORDER BY b_id DESC', []);
        $faculty = DB::select('SELECT * from faculty ORDER BY f_id DESC', []);
        return view('user.auth.home')->with('data', ['publication' => $public_noti, 'books' => $books, 'faculty' => $faculty]);
    }

    public function get_booking_from_search(Request $request){
        $search = $request->search;
        $books = DB::select("SELECT * from books WHERE (f_name LIKE '%$search%') OR (d_name LIKE '%$search%') OR (b_name LIKE '%$search%') OR (b_author LIKE '%$search%') OR (b_path LIKE '%$search%') OR (date_created LIKE '%$search%') ORDER BY b_id DESC", []);
        if(count($books) == 0){
            return ("no result found");
        }

        $s = "";

        foreach ($books as $dt) {
            $s = $s . '
            <div class="book_item_container w3-card w3-round">
                                <div class="book_item_container_left">
                                    <img src="https://corestationers.co.za/wp-content/uploads/woocommerce-placeholder-300x300.png"/>
                                </div>
                                <div class="book_item_container_right">
                                    <div class="top">
                                        <h2>'.$dt->b_name.'</h2>
                                        <div><p class="author">Faculty: '.$dt->f_name.'</p></div>
                                        <div><p class="author">Department: '.$dt->d_name.'</p></div>
                                        <div><p class="author">Author: '.$dt->b_author.'</p></div>
                                    </div>
                                    <div class="bottom">
                                        <a href="'.$dt->b_path.'" target="_blank"><button class="w3-btn w3-btn-block w3-green">GET BOOK</button></a>
                                    </div>
                                </div>
                            </div>
            ';
        }

        return $s;
    }
}
