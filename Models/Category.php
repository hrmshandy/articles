<?php

namespace Labs\Articles\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];

	protected $table = "article_categories";

	public function articles()
	{
		return $this->hasMany(Article::class);
	}
}