<?php

namespace App\Repositories;

use App\Models\Csv;
use App\Contracts\Repositories\CsvRepositoryInterface;
use App\Contracts\Repositories\FunyInterface;


class CsvRepository extends BaseReponsitory implements CsvRepositoryInterface,FunyInterface
{
    public function getModel()
    {
        return CSV::class;
    }

    public function pending($id){
        return "pending";
    }

    public function getTags($id){
        return "getTag";
    }

    public function getPostById($id){
        return "getPostByID";
    }
    public function funy($id){
        return "funny";
    }
}
