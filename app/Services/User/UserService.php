<?php

namespace App\Services\User;

interface UserService
{
    public function findUserById($id);
    public function updateUser($id, $data);
    public function updateUserPassword($id, $data);
}