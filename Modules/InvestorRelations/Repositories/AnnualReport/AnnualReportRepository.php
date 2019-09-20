<?php
namespace Modules\InvestorRelations\Repositories\AnnualReport;

interface AnnualReportRepository
{
    public function all();

    public function getActive();
}