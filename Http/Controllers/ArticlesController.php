<?php

namespace Labs\Articles\Http\Controllers;

use Labs\Articles\Repositories\ArticleRepository as Article;

class ArticlesController extends Controller
{
	protected $article;

	public function __construct(Article $article)
	{
		$this->article = $article;
	}

	public function index()
	{
		$articles = $this->article->latest()->all();
		return view('articles::lists', compact('articles'));
	}

	public function show($slug)
	{
		$article = $this->article->findBy('slug', $slug);
		return view('articles::detail', compact('article'));
	}
}