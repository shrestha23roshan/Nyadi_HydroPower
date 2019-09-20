<?php
namespace Modules\AboutUs\Repositories\CompanyProfile;

interface CompanyProfileRepository
{
    public function all();

    public function getActive();
}