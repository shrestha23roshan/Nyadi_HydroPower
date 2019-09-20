<?php
namespace Modules\Projects\Repositories\ProgressReport;

use App\Repositories\BaseRepositoryEloquent;
use Modules\Projects\Entities\ProgressReport;

class ProgressReportRepositoryEloquent extends BaseRepositoryEloquent implements ProgressReportRepository
{
    protected $model;

    public function __construct(ProgressReport $model)
    {
        $this->model = $model;
    }

    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'desc')->get();
    }
}