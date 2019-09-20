<?php
namespace Modules\MediaManagement\Repositories\Banner;

interface BannerRepository
{
    public function all();

    public function getActive();
}