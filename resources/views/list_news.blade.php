@extends('layouts.app')

@section('title')
  {{ $data->title }}
@endsection

@section('sidebar')
<style type="text/css">
   body {
    font: 1.2em Arial, Helvetica, sans-serif; /* Шрифт на веб-странице */
   }
   a { color: #008BCE; /* Цвет ссылок */ }
   #hr_comments {
     width: 600px;
     margin: 0 150px; /* Ширина колонок */
   }
   #center {
    width: 800px; /* Ширина макета */
    margin: 0 auto; /* Выравниваем по центру */
   }
   #header {
    font-size: 2.2em; /* Размер текста */
    text-align: center; /* Выравнивание по центру */
    padding: 5px; /* Отступы вокруг текста */
    background: #D71920; /* Цвет фона шапки */
   }
   #nav, #aside {
    float: left; width: 110px; padding: 5px;
   }
   #center {
    margin: 0 100px; /* Ширина колонок */
    padding: 10px;
   }
   #aside {
    float: right; color: #000;
   }
   h2 { margin: 0 0 1em; }
  </style>
@endsection

@section('content')

<div id="nav">

</div>
<div id="aside">

</div>
<div id="center">
  <div class="l-col-center-590 article__content">
    <div class="article__header js-article-header">
      <div class="article__header__title">
        <h1 class="js-slide-title" itemprop="headline">{{ $data->title }}</h1>
        <br />
        <sub><b>{{ $data->author->name}}</b> {{ $data->created_at }}</sub>
      </div>
    </div>
    <div class="article__text article__text_free" itemprop="articleBody">
      <div class="article__text__overview">
        <span>-</span>
      </div>
      <div class="article__main-image">
        <div class="article__main-image__wrap">
          <img src="IMAGE" loading="lazy" alt="" class="article__main-image__image js-rbcslider-image">
        </div>
        <div class="article__main-image__title">
          name image
          <span class="article__main-image__author">
          description image
        </span>
        </div>
      </div>
      <br>

      <p class="card-text">{{ $data->body }}</p>

      </p>
      <p><b>Комментарии</b></p>
      <p>

      </p>
      @foreach($data->comments as $comment)
        <div class="row">
            <div class="col-md-10">
                <div class="card mb-10 shadow-sm">
                    <p class="card-text">
                        <div class="alert alert-secondary" role="alert">
                            <p><b>{{$comment->author->name}}</b>
                            <small align="right">{{$comment->created_at}}</small>
                        </div>
                      <div class="d-flex justify-content-between align-items-center">

                            <p>
                                {{ $comment->body }}</p>
                                <a type="button" class="btn btn-sm btn-outline-secondary" title="Delete" href="{{ route('delete_comment', ['id'=>$comment->id])  }}">X</a>


                        <small class="text-muted">{{ $data->created_at }}</small>
                      </div>
                    </p>
                </p>
                </div>
            </div>
        </div><br>
      @endforeach
      <form action={{route('create_comment')}} method="POST">
          <?php  $user_id = Auth::user()->id; ?>
          <input type="hidden" name="user_id" value='{{ $user_id }}'>
          <input type="hidden" name="post_id" value='{{ $data->id }}'>
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"></span>
            </div>
            <textarea class="form-control" aria-label="With textarea" name="body"></textarea>
        </div><br>
          @csrf
          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Добавить') }}
                  </button>
              </div>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
