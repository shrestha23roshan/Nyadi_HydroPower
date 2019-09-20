<?php

namespace Modules\Projects\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Seo\Repositories\Seo\SeoRepository;

class SailentFeatureController extends Controller
{
    private $seo;
    
    public function __construct(SeoRepository $seo)
    {
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('projects::Frontend.SalientFeature.index')
        ->withSeo($this->seo->findByField('page', 'salient features'));
    }
}