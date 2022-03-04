<?php
namespace App\Repositories\Post;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Post\PostRepositoryInterface;


class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    public function createPost($data)
    {
        try {
            $data = [
                'user_id' => auth()->user()->id,
                'post_content' => $data->post_content,
            ];
            return $this->insertData($data);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
