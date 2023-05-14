<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserRepositoryImplement implements UserService
{
    protected $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}