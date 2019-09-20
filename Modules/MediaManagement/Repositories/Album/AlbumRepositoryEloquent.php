<?php
namespace Modules\MediaManagement\Repositories\Album;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\Album;

class AlbumRepositoryEloquent extends BaseRepositoryEloquent implements AlbumRepository
{
    protected $model;

    public function __construct(Album $model)
    {
        $this->model = $model;
    }

    //frontend
    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'desc')->get();
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->first();
    }

    public function getMainAlbumId($id)
    {
        return $this->model->where('main_album_id', $id)->get();
    }

}