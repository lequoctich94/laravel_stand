<?php

namespace App\Repositories;

//use App\Models\Post;
use App\Contracts\Repositories\AbstractRepositoryInterface;

abstract class BaseReponsitory implements AbstractRepositoryInterface
{

    //set model
    //tạo 1 construct ở đây, thay vì bỏ param vào construct sẽ đẫn đến lỗi khi new, ta sẽ sử dụng 1 abstract function để
    //bắt buộc lớp kế thừa class BaseReponsitory phải set param vào
    public function __construct()
    {
        $this->setModel();
    }

    //get model
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        //https://stackoverflow.com/questions/21680795/laravel-4-confused-about-how-to-use-appmake
        $this->model = app()->make(
            $this->getModel()
        );

        // $model = $this->getModel();
        // $this->model = new $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function insert($attributes = []){
        return $this->model->insert($attributes);
    }
}
