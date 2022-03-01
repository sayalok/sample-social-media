<?php

namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = new $model();
    }

    public function insertData($data)
    {
        return $this->model->Create($data);
    }

    public function retrieveData()
    {
        return $this->model->get();
    }

    public function getWhere($condition)
    {
        return $this->model->where($condition)->get();
    }

    public function getWhereWithPagination($condition, $perPage)
    {
        return $this->model->where($condition)->paginate($perPage);
    }

    public function getWhereRaw($condition)
    {
        return $this->model->whereRaw($condition)->get();
    }

    public function getSingleData($id)
    {
        return $this->model->findOrFail($id);
    }

    public function deleteData($id)
    {
        return $this->model::where('id', $id)->delete();
    }

    public function rowCount()
    {
        return $this->model::count();
    }

    public function getTheFirstRecord()
    {
        return $this->model::all()->first()->id;
    }

    public function searchQuery($colomnName, $keywords)
    {
        return $this->model::where($colomnName, 'LIKE', '%' . $keywords . '%')->paginate(20);
    }

    public function updateDataWhereArr($id, $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }
}
