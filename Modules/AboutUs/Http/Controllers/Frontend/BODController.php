<?php

namespace Modules\AboutUs\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AboutUs\Repositories\BOD\BodRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class BODController extends Controller
{
    private $bod;

    private $seo;

    public function __construct(BodRepository $bod, SeoRepository $seo)
    {
        $this->bod = $bod;
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('aboutus::Frontend.BOD.index')
        ->withBods($this->bod->getActive())
        ->withSeo($this->seo->findByField('page', 'board of director'));
    }


}
