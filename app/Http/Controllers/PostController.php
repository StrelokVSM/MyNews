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

    public function show_create_new() {
        return view('/admin/create_new');
    }
    public function create_new(Request $request) {
        //Редактирование новости
        $model= new Posts;

        $model->title=$request->input('title');
        $model->body=$request->input('body');
        $model->slug=$request->input('slug');
        $model->active=$request->input('active');
        $model->save();

        return redirect()->route('admintable')->with('status', 'New created!');
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
=======
    public function edit(Request $request) {
        //dd($request);
        //$name = $request->input('stud_name');
        $model=Posts::find($request->input('id'));
        $model->title=$request->input('title');
        $model->save();
        //Post::update('update student set name = ? where id = ?',[$id, $title, $body, $slug, $active, $created_at, $updated_at]);
        return redirect()->back()->with('status', 'Profile updated!');;
  }
>>>>>>> a6953c129f2141cc38209ee7d9626bfe0b94551b
}
