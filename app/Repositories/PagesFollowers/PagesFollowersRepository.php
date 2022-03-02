<?php
namespace App\Repositories\PagesFollowers;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Auth;
use App\Repositories\PagesFollowers\PagesFollowersRepositoryInterface;


class PagesFollowersRepository extends BaseRepository implements PagesFollowersRepositoryInterface
{

    public function followerAdd($data)
    {
        try {
            $data = [
                'user_id' => auth()->user()->id,
                'pages_id' => $data->page_id,
            ];
            return $this->insertData($data);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
