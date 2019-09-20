<?php
namespace Modules\Pages\Repositories\Page;

interface PageRepository
{
    public function all();

    public function findByParentId($parentId);

    public function getParentPages($parentId);

    public function getChildPages($parentId);

    public function getParentId();


}