<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class CommentController extends Controller
{
  public function index(){
    $comments = Comments::all();
  	return view('list_news', ['comments'=>$comments]);
  }
  public function delete($id) {
      //Удаление новости
      //dd($id);
      $model=Comments::find($id);
      $model->delete();

      return redirect()->back()->with('status', "comments delete!");
  }
  public function insert(Request $request){
      //Добавление комментария
      $model= new Comments;
      $model->post_id = $request->input('post_id');
      $model->user_id = $request->input('user_id');
      $model->body = $request->input('body');

      $model->save();

      return back();
  }
}
