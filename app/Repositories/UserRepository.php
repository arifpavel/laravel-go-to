<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::where('id', $id)->get();
    }

    /**
     * Get All roles.
     */
    public function getRole($id = null, $method = 'get'){
        if($id != null){
            return Role::findOrFail($id);
        }

        if($id == null && $method == 'pluck'){
            return Role::pluck('name', 'id');
        }

        return Role::all();
    }
}