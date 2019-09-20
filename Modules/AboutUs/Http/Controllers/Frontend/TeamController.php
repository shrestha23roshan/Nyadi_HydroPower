<?php

namespace Modules\AboutUs\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AboutUs\Repositories\Team\TeamRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class TeamController extends Controller
{
    private $team;
    private $seo;

    public function __construct(TeamRepository $team, SeoRepository $seo)
    {
        $this->team = $team;
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('aboutus::Frontend.Team.index')
        ->withTeams($this->team->getActive())
        ->withSeo($this->seo->findByField('page', 'nhl team'));
    }
}