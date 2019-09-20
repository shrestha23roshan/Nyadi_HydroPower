<?php
namespace Modules\AboutUs\Repositories\BOD;

interface BodRepository
{
    public function all();

    public function getActive();
}