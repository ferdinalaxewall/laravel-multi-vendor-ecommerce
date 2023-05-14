<?php

namespace App\Repositories;

class GlobalRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    protected function findAll($orderColumn = 'created_at', $orderType = 'DESC')
    {
        return $this->model->orderBy($orderColumn, $orderType)->get();
    }

    protected function findOneById($id, $orderColumn = 'created_at', $orderType = 'DESC')
    {
        return $this->model->where('id', $id)->orderBy($orderColumn, $orderType)->first();
    }
    
    protected function findWhere($column = null, $value = null, $orderColumn = 'created_at', $orderType = 'DESC')
    {
        return $this->model->where($column, $value)->orderBy($orderColumn, $orderType)->get();
    }

    protected function findOneWhere($column = null, $value = null, $orderColumn = 'created_at', $orderType = 'DESC')
    {
        return $this->model->where($column, $value)->orderBy($orderColumn, $orderType)->first();
    }

    protected function insert($data)
    {
        return $this->model->create($data);
    }

    /**
    *   @param($data :array)
    */
    protected function insertMany($data)
    {
        $this->model->where($column, $value)->update($data);
    }

    protected function updateById($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    protected function updateWhere($column = null, $value = null, $data)
    {
        return $this->model->where($column, $value)->update($data);
    }

    protected function deleteById($id)
    {
        $this->model->where('id', $id)->delete();
    }

    protected function deleteWhere($column = null, $value = null)
    {
        $this->model->where($column, $value)->delete();
    }
}