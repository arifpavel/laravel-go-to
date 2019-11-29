<?php

namespace App\Repositories;

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
        return User::findOrFail($id);
    }

    public function getUserByName($username = null)
    {
        return User::where('username', $username)->firstOrFail();
    }

    /**
     * update user.
     */
    public function updateUser($id = null, $request = null){
        $user = $this->getUserById($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->bio = $request->bio;
        $user->status = $request->status ? $request->status : '';
        $user->save();
        return $user;
    }

    /**
     * Delete User
     */
    public function delete($id = null){
        $user = $this->getUserById($id);
        return $user->delete();
    }
}