<?php

namespace Modules\InvestorRelations\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\InvestorRelations\Repositories\AnnualReport\AnnualReportRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class AnnualReportController extends Controller
{
    private $annual_report;
    private $seo;

    public function __construct(AnnualReportRepository $annual_report, SeoRepository $seo)
    {
        $this->annual_report = $annual_report;
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('investorrelations::Frontend.AnnualReport.index')
        ->withAnnualReports($this->annual_report->getActive())
        ->withSeo($this->seo->findByField('page', 'annual reports'));
    }
}
