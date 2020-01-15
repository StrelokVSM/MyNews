<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostController extends Controller
{
    public function index(){
      $datas = Posts::all();
    	return view('main', ['datas'=>$datas]);
    }
}
