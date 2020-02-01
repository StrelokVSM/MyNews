@extends('layouts.app')

@section('title', 'Администратор')

@section('sidebar')
    @parent

@endsection

@section('content')
<br>
<form action="/admintable/{{ $data->id }}" method="POST">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Имя автора</label>
        <input type="text" class="form-control" placeholder="Name User">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Заголовок</label>
        <input type="text" class="form-control" name="title" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Slug</label>
        <input type="text" class="form-control" name="slug" placeholder="Slug">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Активный</label>
        <select class="form-control" id="exampleFormControlSelect1" name="active">
            <option>0</option>
            <option>1</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">body</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="10">{{ $data->body }}</textarea>
    </div>
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Добавить') }}
            </button>
        </div>
    </div>
</form>

@endsection
