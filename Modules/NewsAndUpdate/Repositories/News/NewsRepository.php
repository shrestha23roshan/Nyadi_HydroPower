<?php
namespace Modules\NewsAndUpdate\Repositories\News;

interface NewsRepository
{
    public function all();

    public function getActive();

}