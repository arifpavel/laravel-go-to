<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function all();

    public function getUserById($id);

    public function getUserByName($username = null);

    public function updateUser($id = null, $request = null);

    public function delete($id = null);
}