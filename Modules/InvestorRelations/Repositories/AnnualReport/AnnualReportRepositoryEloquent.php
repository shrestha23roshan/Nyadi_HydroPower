<?php
namespace Modules\InvestorRelations\Repositories\AnnualReport;

use App\Repositories\BaseRepositoryEloquent;
use Modules\InvestorRelations\Entities\AnnualReport;

class AnnualReportRepositoryEloquent extends BaseRepositoryEloquent implements AnnualReportRepository
{
    protected $model;

    public function __construct(AnnualReport $model)
    {
        $this->model = $model;
    }

    //frontend
    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'desc')->get();
    }
}