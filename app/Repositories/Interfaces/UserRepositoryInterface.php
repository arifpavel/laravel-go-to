<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function all();

    public function getUserById($id);

    public function getRole($id = null, $method = 'get');
}