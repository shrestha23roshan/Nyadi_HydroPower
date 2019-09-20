<?php

namespace Modules\MediaManagement\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaManagement\Repositories\Video\VideoRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class VideoController extends Controller
{
    private $video;
    private $seo;

    public function __construct(VideoRepository $video, SeoRepository $seo)
    {
        $this->video = $video;
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('mediamanagement::Frontend.Video.index')
        ->withVideos($this->video->getActive())
        ->withSeo($this->seo->findByField('page', 'video'));
    }
}