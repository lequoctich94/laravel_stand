<?php

namespace App\Contracts\Repositories;

interface AbstractRepositoryInterface
{
  /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * insert data 1 row, it can reponse last id insert
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * insert data multiple row
     * @param array $attributes
     * @return mixed
     */
    public function insert($attributes = []);
}
