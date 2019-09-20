<?php

namespace Modules\NewsAndUpdate\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\NewsAndUpdate\Repositories\News\NewsRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class NewsController extends Controller
{
    private $seo;

    private $news;

    public function __construct(SeoRepository $seo,NewsRepository $news)
    {
        $this->seo = $seo;
        $this->news = $news;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function show($id)
    {
        // dd($this->news->single());
        return view('newsandupdate::Frontend.news')
        ->withNews($this->news->find($id))
        ->withSeo($this->seo->findByField('page', 'news & update'));
    }
}