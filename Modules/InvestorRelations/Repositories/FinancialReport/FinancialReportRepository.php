<?php
namespace Modules\InvestorRelations\Repositories\FinancialReport;

interface FinancialReportRepository
{
    public function all();

    public function getActive();
}