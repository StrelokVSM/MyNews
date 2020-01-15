<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	// таблица комментариев в базе данных
	protected $guarded = [];
	// прокомментрировавший пользователь
	public function author()
	{
		return $this->belongsTo('App\User','user_id');
	}
	// возвращает пост любого комментария
	public function post()
	{
		return $this->belongsTo('App\Posts','post_id');
	}
}
