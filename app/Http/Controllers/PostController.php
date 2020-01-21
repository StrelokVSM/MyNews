<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostController extends Controller
{
  public function index(){
    $datas = Posts::paginate(12);// Пагинация
  	return view('main', ['datas'=>$datas]);
  }
  public function show($id){
    $data = Posts::find($id);
  	return view('list_news', ['data'=>$data]);
  }
}
