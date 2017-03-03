<?php

namespace Labs\Articles\Repositories;

use Labs\Core\Eloquent\Repository;

class ArticleRepository extends Repository
{
	/**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Labs\Articles\Models\Article';
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        $this->applyCriteria();
        if(in_array($attribute, $this->model->translatedAttributes)) {
        	return $this->model->whereTranslation($attribute, $value)->first($columns);
        }
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findAllBy($attribute, $value, $columns = array('*'))
    {
        $this->applyCriteria();
        if(in_array($attribute, $this->model->translatedAttributes)) {
        	return $this->model->whereTranslation($attribute, $value)->get($columns);
        }
        return $this->model->where($attribute, '=', $value)->get($columns);
    }
}