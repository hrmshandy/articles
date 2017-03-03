<?php

namespace Labs\Articles\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	use Translatable;

	/**
	 *
	 * @var array
	 */
	public $translatedAttributes = ['title', 'slug', 'content', 'excerpt', 'meta'];

	/**
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * BelongsTo relation to category
     * @return object
     */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}