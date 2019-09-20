<?php
namespace Modules\MediaManagement\Repositories\MainAlbum;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\MainAlbum;

class MainAlbumRepositoryEloquent extends BaseRepositoryEloquent implements MainAlbumRepository
{
    protected $model;

    public function __construct(MainAlbum $model)
    {
        $this->model = $model;
    }

    // public function getMainId($id)
    // {
    //     return $this->model->where('id', $id)->get();
    // }
}