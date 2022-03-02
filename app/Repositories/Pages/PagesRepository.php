<?php
namespace App\Repositories\Pages;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Pages\PagesRepositoryInterface;


class PagesRepository extends BaseRepository implements PagesRepositoryInterface
{

    public function createPage($data)
    {
        try {
            $data = [
                'user_id' => auth()->user()->id,
                'page_name' => $data->page_name,
            ];
            return $this->insertData($data);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
