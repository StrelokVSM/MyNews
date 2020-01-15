<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
	protected $table = 'posts';
	// запрещает изменение колонок
	protected $guarded = [];
	// у постов множество комментариев
	// возвращает все комментарии к посту
	public function comments()
	{
		return $this->hasMany('App\Comments','post_id');
	}
	// возвращает сущность пользователя, который является автором этого поста
	public function author()
	{
		return $this->belongsTo('App\User','user_id');
	}
}
