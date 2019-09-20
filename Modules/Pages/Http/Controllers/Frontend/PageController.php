<?php

namespace Modules\Pages\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Pages\Repositories\Page\PageRepository;

class PageController extends Controller
{
    /**
     * The page repository instance.
     *
     * @var PageRepository
     */
    protected $page;

    /**
     * Create a new controller instance.
     *
     * @param PageRepository $page
     * @return void
     */
    public function __construct(
        PageRepository $page
    )
    {
        $this->page = $page;
    }

    /**
     * Display detail of the press
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        // dd($this->page->findByField('slug', $slug));
        return view('pages::Frontend.Page.show')
            ->withPage($this->page->findByField('slug', $slug));
            // ->withSeo($this->seo->findByField('page', 'progress report'));

            // ->withPages($this->page->getParentId());
    }
}
