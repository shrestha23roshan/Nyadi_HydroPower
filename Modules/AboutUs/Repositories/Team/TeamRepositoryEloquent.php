<?php
namespace Modules\AboutUs\Repositories\Team;

use App\Repositories\BaseRepositoryEloquent;
use Modules\AboutUs\Entities\Team;

class TeamRepositoryEloquent extends BaseRepositoryEloquent implements TeamRepository
{
    protected $model;

    public function __construct(Team $model)
    {
        $this->model = $model;
    }

    //frontend
    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->get();
    }
}