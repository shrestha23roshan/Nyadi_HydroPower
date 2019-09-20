<?php
namespace Modules\AboutUs\Repositories\BOD;

use App\Repositories\BaseRepositoryEloquent;
use Modules\AboutUs\Entities\BOD;

class BodRepositoryEloquent extends BaseRepositoryEloquent implements BodRepository
{
    protected $model;

    public function __construct(BOD $model)
    {
        $this->model = $model;
    }

    //frontend
    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->get();
    }
}