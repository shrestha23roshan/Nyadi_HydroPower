<?php

namespace Modules\AboutUs\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AboutUs\Repositories\CompanyProfile\CompanyProfileRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class CompanyProfileController extends Controller
{
    private $company_profile;

    private $seo;

    public function __construct(CompanyProfileRepository $company_profile, SeoRepository $seo)
    {
        $this->company_profile = $company_profile;
        $this->seo = $seo;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('aboutus::Frontend.CompanyProfile.index')
        ->withCompanyProfile($this->company_profile->getActive())
        ->withSeo($this->seo->findByField('page', 'company-profile'));
    }


}
