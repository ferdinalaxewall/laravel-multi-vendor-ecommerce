<?php

namespace App\Repositories;

class GlobalRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function findAll($orderColumn = 'created_at', $orderType = 'DESC')
    {
        return $this->model->orderBy($orderColumn, $orderType)->get();
    }

    public function findOneById($id, $orderColumn = 'created_at', $orderType = 'DESC')
    {
        return $this->model->where('id', $id)->orderBy($orderColumn, $orderType)->first();
    }
    
    public function findWhere($column = null, $value = null, $orderColumn = 'created_at', $orderType = 'DESC')
    {
        return $this->model->where($column, $value)->orderBy($orderColumn, $orderType)->get();
    }

    public function findOneWhere($column = null, $value = null, $orderColumn = 'created_at', $orderType = 'DESC')
    {
        return $this->model->where($column, $value)->orderBy($orderColumn, $orderType)->first();
    }

    public function insert($data)
    {
        return $this->model->create($data);
    }

    /**
    *   @param($data :array)
    */
    public function insertMany($data)
    {
        $this->model->where($column, $value)->update($data);
    }

    public function updateById($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function updateWhere($column = null, $value = null, $data)
    {
        return $this->model->where($column, $value)->update($data);
    }

    public function deleteById($id)
    {
        $this->model->where('id', $id)->delete();
    }

    public function deleteWhere($column = null, $value = null)
    {
        $this->model->where($column, $value)->delete();
    }
}