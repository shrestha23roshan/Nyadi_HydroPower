<?php
namespace Modules\Projects\Repositories\ProgressReport;

interface ProgressReportRepository
{
    public function all();

    public function getActive();
}