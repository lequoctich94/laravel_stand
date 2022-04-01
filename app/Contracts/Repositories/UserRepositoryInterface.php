<?php
namespace App\Contracts\Repositories;

interface UserRepositoryInterface extends AbstractRepositoryInterface
{
    public function getUser($id);

    public function getUserId($id);
}
