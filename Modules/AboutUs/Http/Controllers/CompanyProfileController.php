<?php

namespace Modules\AboutUs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AboutUs\Repositories\CompanyProfile\CompanyProfileRepository;
use Modules\AboutUs\Http\Requests\CompanyProfile\UpdateRequest;

class CompanyProfileController extends Controller
{
    private $company_profile;

    public function __construct(CompanyProfileRepository $company_profile)
    {
        $this->company_profile = $company_profile;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('aboutus::CompanyProfile.index')
        ->withCompanyProfiles($this->company_profile->all());
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('aboutus::CompanyProfile.edit')
        ->withCompanyProfile($this->company_profile->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request ,$id)
    {
        $data = $request->all();

        $company_profile = $this->company_profile->update($id, $data);
        if($company_profile){
            return redirect()->route('admin.about-us.company-profile.index')
                ->withSuccessMessage('Company Profile is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Company Profile can not be updated.');
    }

}
