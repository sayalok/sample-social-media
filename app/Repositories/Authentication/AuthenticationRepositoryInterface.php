<?php

namespace App\Repositories\Authentication;

interface AuthenticationRepositoryInterface
{

    // public function loginRequestProcess($data);

    public function registerUser($data);
}
