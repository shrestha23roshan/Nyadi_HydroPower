<?php
namespace Modules\Pages\Repositories\Page;

use App\Repositories\BaseRepositoryEloquent;
use Modules\Pages\Entities\Page;

class PageRepositoryEloquent extends BaseRepositoryEloquent implements PageRepository
{
    protected $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

      /**
     * Get page by parentId
     * 
     * @param int $parentId
     * @return \App\Modules\Content\Models\Page 
     */
    public function findByParentId($parentId)
    {
        return $this->model->where('parent_id', $parentId)->get();
    }

    /**
     * Get latest parent pages.
     * 
     * @param int $parentId
     */
    public function getParentPages($parentId)
    {
        return $this->model->where('parent_id', $parentId)->latest()->get();
    }

    /**
     * Get latest child pages.
     * 
     * @param int $parentId
     */
    public function getChildPages($parentId)
    {
        return $this->model->whereNotIn('parent_id', [$parentId])->latest()->get();
    }

    public function getParentId()
    {
        return $this->model->whereNotIn('id', '=', '1')->get();
    }

}