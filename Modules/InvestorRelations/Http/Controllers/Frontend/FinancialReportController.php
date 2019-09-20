<?php

namespace Modules\InvestorRelations\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\InvestorRelations\Repositories\FinancialReport\FinancialReportRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class FinancialReportController extends Controller
{
    private $financial_report;
    private $seo;

    public function __construct(FinancialReportRepository $financial_report, SeoRepository $seo)
    {
        $this->financial_report = $financial_report;
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('investorrelations::Frontend.FinancialReport.index')
        ->withFinancialReports($this->financial_report->getActive())
        ->withSeo($this->seo->findByField('page', 'financial reports'));
    }
}
