<?php
namespace Modules\MediaManagement\Repositories\Video;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\Video;

class VideoRepositoryEloquent extends BaseRepositoryEloquent implements VideoRepository
{
    protected $model;

    public function __construct(Video $model)
    {
        $this->model = $model;
    }

    //frontend
    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'desc')->get();
    }
}