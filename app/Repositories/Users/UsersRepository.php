<?php
namespace App\Repositories\Users;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Users\UsersRepositoryInterface;


class UsersRepository extends BaseRepository implements UsersRepositoryInterface
{

    public function getUserDetails()
    {
        try {
            return auth()->user();
        } catch (\Throwable $th) {
            return false;
        }
    }
}
