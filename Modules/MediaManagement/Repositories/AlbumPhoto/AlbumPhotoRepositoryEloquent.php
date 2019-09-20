<?php
namespace Modules\MediaManagement\Repositories\AlbumPhoto;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\AlbumPhoto;

class AlbumPhotoRepositoryEloquent extends BaseRepositoryEloquent implements AlbumPhotoRepository
{
    protected $model;

    public function __construct(AlbumPhoto $model)
    {
        $this->model = $model;
    }

    /**
     * find photo based on album id and return
     */
    public function findByAlbumId($id)
    {
        return $this->model->where('album_id', '=', $id)->get();
    }

    // public function getId($id)
    // {
    //     return $this->model->where('album_id', '=', $id)->get();
    // }
}