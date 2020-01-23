@extends('layouts.app')

@section('title', 'Администратор')

@section('sidebar')
    @parent
<style>
    .table{
        font-size : 14px;
        font-family : TimesNewRoman;
    }
</style>
@endsection

@section('content')

<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">user_id</th>
        <th scope="col">title</th>
        <th scope="col">body</th>
        <th scope="col">slug</th>
        <th scope="col">active</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($datas as $data)
    <tr>
        <th scope="row">{{ $data->id }}</th>
        <td>{{ $data->user_id }}</td>
        <td>{{ substr($data->title, 0, 50) }}</td>
        <td>{{ substr($data->body, 0, 50) }}</td>
        <th>{{ $data->slug }}</th>
        <td>{{ $data->active }}</td>
        <td>{{ $data->created_at }}</td>
        <td>{{ $data->updated_at }}</td>
        <td>
            <a href='{{ route('edit_new', ['id'=>$data->id])  }}' class="btn btn-outline-dark">edit</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<p align = "center">{{ $datas->links() }}</p>
@endsection
