<?php

namespace Modules\Projects\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Projects\Repositories\ProgressReport\ProgressReportRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class ProgressReportController extends Controller
{
    private $progress_report;
    private $seo;

    public function __construct(ProgressReportRepository $progress_report, SeoRepository $seo)
    {
        $this->progress_report = $progress_report;
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('projects::Frontend.ProgressReport.index')
        ->withProgressReports($this->progress_report->getActive())
        ->withSeo($this->seo->findByField('page', 'progress report'));
    }
}