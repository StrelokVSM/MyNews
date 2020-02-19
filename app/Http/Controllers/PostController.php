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

    public function insertform() {
        return view('/insert_new');
    }
    public function insert(Request $request) {
        //Добавление новости
        $model= new Posts;
        $model->user_id = $request->input('user_id');
        $model->title = $request->input('title');
        $model->body = $request->input('body');
        $model->slug = $request->input('slug');
        $model->active = $request->input('active');
        $model->save();

        return view('list_news', ['data'=>$model])->with('status', 'New created!');
    }
    public function edit(Request $request) {
        //Редактирование новости
        $model=Posts::find($request->input('id'));
        $model->title=$request->input('title');
        $model->body=$request->input('body');
        $model->slug=$request->input('slug');
        $model->active=$request->input('active');
        $model->save();

        return redirect()->route('admintable')->with('status', 'Profile updated!');
    }
    public function delete($id) {
        //Удаление новости
        //dd($id);
        $model=Posts::find($id);
        $model->delete();

        return redirect()->route('admintable')->with('status', "New delete!");
    }
}
