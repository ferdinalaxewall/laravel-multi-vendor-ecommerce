<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\GlobalRepository;

class UserRepositoryImplement extends GlobalRepository implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}