<?php
namespace App\Repositories\PersonFollowers;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Auth;
use App\Repositories\PersonFollowers\PersonFollowersRepositoryInterface;


class PersonFollowersRepository extends BaseRepository implements PersonFollowersRepositoryInterface
{

    public function followerAdd($data)
    {
        try {
            $data = [
                'followers_id' => auth()->user()->id,
                'user_id' => $data->user_id,
            ];
            return $this->insertData($data);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
