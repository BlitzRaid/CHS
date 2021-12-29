<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//where('coulmn name', comparison operator, 'value')
//orwhere
//oderby('coulmn name', 'asc' or 'desc')
//latest() or odlest() or inRandomRrder()
//find($id);
//min and max
//sum
//avg

//->select('body')
//->get(); 

// ->insert([
//     'title' => 'new post', 'body' => 'new body'
// ])
// ;  
//delete based on where



class PostsController extends Controller
{
    public function index()
    {
        $id = 2;
        $posts = DB::table('posts')
            ->where('id', '=', 5)
            ->delete();
            ;
        

        dd($posts);
    }
}
