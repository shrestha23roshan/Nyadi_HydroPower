<?php
namespace Modules\AboutUs\Repositories\CompanyProfile;

use App\Repositories\BaseRepositoryEloquent;
use Modules\AboutUs\Entities\CompanyProfile;

class CompanyProfileRepositoryEloquent extends BaseRepositoryEloquent implements CompanyProfileRepository
{
    protected $model;

    public function __construct(CompanyProfile $model)
    {
        $this->model = $model;
    }

    //frontend
    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->first();
    }
}