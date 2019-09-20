<?php
namespace Modules\InvestorRelations\Repositories\FinancialReport;

use App\Repositories\BaseRepositoryEloquent;
use Modules\InvestorRelations\Entities\FinancialReport;

class FinancialReportRepositoryEloquent extends BaseRepositoryEloquent implements FinancialReportRepository
{
    protected $model;

    public function __construct(FinancialReport $model)
    {
        $this->model = $model;
    }

    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'desc')->get();
    }
}