<?php
namespace Modules\Popup\Repositories\Popup;

use App\Repositories\BaseRepositoryEloquent;
use Modules\Popup\Entities\Popup;

class PopupRepositoryEloquent extends BaseRepositoryEloquent implements PopupRepository
{
    protected $model;

    public function __construct(Popup $model)
    {
        $this->model = $model;
    }

    public function getActive()
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'desc')->get();
    }
}