<?php

namespace App\Repositories;

//use App\Models\Post;
use App\Models\Csv;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\FunyInterface;

class UserReponsitory extends BaseReponsitory implements UserRepositoryInterface,FunyInterface
{
    public function getModel()
    {
        return CSV::class;
    }

    public function getUser($id){
        return "getUserId";
    }

    public function getUserId($id){
        return "getUser";
    }

}
