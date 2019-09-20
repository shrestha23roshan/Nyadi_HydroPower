<?php

namespace Modules\InvestorRelations\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\InvestorRelations\Repositories\FinancialReport\FinancialReportRepository;
use Modules\InvestorRelations\Http\Requests\FinancialReport\StoreRequest;
use Modules\InvestorRelations\Http\Requests\FinancialReport\UpdateRequest;

class FinancialReportController extends Controller
{
    private $financial_report;

    public function __construct(FinancialReportRepository $financial_report)
    {
        $this->financial_report = $financial_report;
        $this->destinationpath = 'uploads/investor-relations/financialreports/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('investorrelations::FinancialReport.index')
        ->withFinancialReports($this->financial_report->getLatest());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('investorrelations::FinancialReport.create');
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
            $new_file_name = "financial_report_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $financial_report = $this->financial_report->create($data);
        if($financial_report){
            return redirect()->route('admin.investor-relations.financialreport.index')
                        ->withSuccessMessage('Financial Report is added successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Financial Report can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('investorrelations::FinancialReport.edit')
        ->withFinancialReport($this->financial_report->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $financial_report = $this->financial_report->find($id);
        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $financial_report->attachment) &&  $financial_report->attachment != '') {
                unlink($this->destinationpath . $financial_report->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "financial_report_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $financial_report = $this->financial_report->update($id, $data);
        if($financial_report){
            return redirect()->route('admin.investor-relations.financialreport.index')
                        ->withSuccessMessage('Financial Report is update successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Financial Report can not be update.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $financial_report = $this->financial_report->find($id);
        $previousAttachment = $financial_report->attachment;
        $flag = $this->financial_report->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }
            return response()->json([
                'type' => 'success',
                'message' => 'Financial Report is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Financial Report can not be deleted.',
        ], 422);
    }
}
