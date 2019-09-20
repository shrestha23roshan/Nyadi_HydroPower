<?php 
namespace Modules\Projects\Repositories\NHP;

interface NHPRepository
{
    public function all();

    public function getActive();
}