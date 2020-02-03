@extends('layouts.app')

@section('title', 'Администратор')

@section('sidebar')
    @parent

@endsection

@section('content')
<br>
<form action="{{route('create_new')}}" method="POST">
    <?php  $user_id = Auth::user()->id; ?>
    <input type="hidden" name="user_id" value='{{ $user_id }}'>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Заголовок</label>
        <input type="text" class="form-control" name="title" placeholder="Title">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Slug</label>
            <input type="text" class="form-control" name="slug" placeholder="Slug">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlSelect1">Активный</label>
            <select class="form-control" id="exampleFormControlSelect1" name="active">
                <option>0</option>
                <option>1</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">body</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="10"> </textarea>
    </div>
    <input type="hidden" name="updated_at" value="NULL">
    @csrf
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Добавить') }}
            </button>
        </div>
    </div>
    <br>
</form>

@endsection
