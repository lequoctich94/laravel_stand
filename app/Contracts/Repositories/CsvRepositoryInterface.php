<?php
namespace App\Contracts\Repositories;

interface CsvRepositoryInterface extends AbstractRepositoryInterface
{
    public function pending($id);

    public function getTags($id);

    public function getPostById($id);
}
