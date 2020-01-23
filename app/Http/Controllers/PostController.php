<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostController extends Controller
{
    public function index_admin(){
    $datas = Posts::paginate(12);// Пагинация
    	return view('/admin/table_list_news', ['datas'=>$datas]);
    }
    public function index(){
    $datas = Posts::paginate(12);// Пагинация
    	return view('main', ['datas'=>$datas]);
    }
    public function show($id){
    $data = Posts::find($id);
    	return view('list_news', ['data'=>$data]);
    }
    public function show_admin($id) {
        $data = Posts::find($id);
        	return view('/admin/edit_new', ['data'=>$data]);
    }
    public function edit(Request $id, $title, $body, $slug, $active, $created_at, $updated_at) {
        $name = $request->input('stud_name');
        Post::update('update student set name = ? where id = ?',[$id, $title, $body, $slug, $active, $created_at, $updated_at]);
        echo "Record updated successfully.<br/>";
        echo '<a href = "/admintable">Click Here</a> to go back.';
  }
}
