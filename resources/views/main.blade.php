<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Новости')

@section('sidebar')
    @parent

@endsection

@section('content')
    <br>
    <div class="row">
        @foreach($datas as $data)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <div class="card-body">
              <p class="card-text">
                <b>{{ $data->title}}</b><hr>
                {{ substr($data->body, 0, 200) }}
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href='{{ route('new', ['id'=>$data->id])  }}' class="btn btn-sm btn-outline-secondary">View</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">{{ $data->created_at }}</small>
                </div>
              </p>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    <!--Вывод Пагнитации-->
    <p align = "center">{{ $datas->links() }}</p><!-- не хочет становиться по средине -->
@endsection
