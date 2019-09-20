<?php

namespace Modules\InvestorRelations\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\InvestorRelations\Repositories\AnnualReport\AnnualReportRepository;
use Modules\InvestorRelations\Http\Requests\AnnualReport\StoreRequest;
use Modules\InvestorRelations\Http\Requests\AnnualReport\UpdateRequest;

class AnnualReportController extends Controller
{
    private $annual_report;

    public function __construct(AnnualReportRepository $annual_report)
    {
        $this->annual_report = $annual_report;
        $this->destinationpath = 'uploads/investor-relations/annualreports/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('investorrelations::AnnualReport.index')
        ->withAnnualReports($this->annual_report->getLatest());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('investorrelations::AnnualReport.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('attachment');
        $imageFile = $request->attachment;
        if($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "annual_report_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $annual_report = $this->annual_report->create($data);
        if($annual_report){
            return redirect()->route('admin.investor-relations.annualreport.index')
                        ->withSuccessMessage('Annual Report is added successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Annual Report can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('investorrelations::AnnualReport.edit')
        ->withAnnualReport($this->annual_report->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $annual_report = $this->annual_report->find($id);
        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $annual_report->attachment) &&  $annual_report->attachment != '') {
                unlink($this->destinationpath . $annual_report->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "annual_report_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $annual_report = $this->annual_report->update($id, $data);
        if($annual_report){
            return redirect()->route('admin.investor-relations.annualreport.index')
                        ->withSuccessMessage('Annual Report is update successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Annual Report can not be update.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $annual_report = $this->annual_report->find($id);
        $previousAttachment = $annual_report->attachment;
        $flag = $this->annual_report->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }
            return response()->json([
                'type' => 'success',
                'message' => 'Annual Report is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Annual Report can not be deleted.',
        ], 422);
    }
}
