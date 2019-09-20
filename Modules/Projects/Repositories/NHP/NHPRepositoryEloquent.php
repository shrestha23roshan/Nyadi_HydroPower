<?php 
namespace Modules\Projects\Repositories\NHP;

use App\Repositories\BaseRepositoryEloquent;
use Modules\Projects\Entities\NHP;

class NHPRepositoryEloquent extends BaseRepositoryEloquent implements NHPRepository
{
    protected $model;

    public function __construct(NHP $model)
    {
        $this->model = $model;
    }

    //frontend
    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->get();
    }
}