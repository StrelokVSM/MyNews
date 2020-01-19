<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers;

class CommentController extends Controller
{
  public function index(){
    $comments = Comments::all();
  	return view('list_news', ['comments'=>$comments]);
  }
}
