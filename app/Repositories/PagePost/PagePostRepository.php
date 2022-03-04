<?php
namespace App\Repositories\PagePost;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Auth;
use App\Repositories\PagePost\PagePostRepositoryInterface;


class PagePostRepository extends BaseRepository implements PagePostRepositoryInterface
{

    public function createPagePost($data)
    {
        try {
            $data = [
                'user_id' => auth()->user()->id,
                'page_id' => $data->page_id,
                'post_content' => $data->post_content,
            ];
            return $this->insertData($data);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
