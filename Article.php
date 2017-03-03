<?php

namespace Labs\Articles;

use Labs\Articles\Models\Article as ArticleModel;

class Article
{
	protected $model;

	public function __construct(ArticleModel $model)
	{
		$this->model = $model;
	}

	public function render($view = 'articles::lists')
	{
		$articles = $this->model->latest()->paginate(6);
		return view($view, compact('articles'));
	}
}