<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Pages\Repositories\Page\PageRepository;

class HeaderComposer
{
    private $pages;

    /**
     * Create a new sidebar composer.
     *
     * @return void
     */
    public function __construct(
      PageRepository $pages
    )
    {
        $this->pages = $pages;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
       $view ->withPages($this->pages->with(['activeChildrens'])
       ->where('is_active', '1')
       ->where('parent_id', '0')
       ->get());
    }
}
