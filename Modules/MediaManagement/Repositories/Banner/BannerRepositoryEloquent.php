<?php
namespace Modules\MediaManagement\Repositories\Banner;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\Banner;

class BannerRepositoryEloquent extends BaseRepositoryEloquent implements BannerRepository
{
    protected $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    //frontend
    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'asc')->get();
    }

}