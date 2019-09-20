<?php
namespace Modules\AboutUs\Repositories\Team;

interface TeamRepository
{
    public function all();

    public function getActive();
}