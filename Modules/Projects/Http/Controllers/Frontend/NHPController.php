<?php

namespace Modules\Projects\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Projects\Repositories\NHP\NHPRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class NHPController extends Controller
{
    private $nhp;
    private $seo;

    public function __construct(NHPRepository $nhp, SeoRepository $seo)
    {
        $this->nhp = $nhp;
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('projects::Frontend.NHP.index')
        ->withNhps($this->nhp->getActive())
        ->withSeo($this->seo->findByField('page', 'nyadi hydropower project'));
    }
}