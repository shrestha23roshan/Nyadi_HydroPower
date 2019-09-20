<?php
namespace Modules\NewsAndUpdate\Repositories\News;

use App\Repositories\BaseRepositoryEloquent;
use Modules\NewsAndUpdate\Entities\News;

class NewsRepositoryEloquent extends BaseRepositoryEloquent implements NewsRepository
{
    protected $model;

    public function __construct(News $model)
    {
        $this->model = $model;
    }

    //frontend

    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'desc')->get();
    }

}