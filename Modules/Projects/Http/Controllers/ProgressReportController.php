<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Projects\Repositories\ProgressReport\ProgressReportRepository;
use Modules\Projects\Http\Requests\ProgressReport\StoreRequest;
use Modules\Projects\Http\Requests\ProgressReport\UpdateRequest;

class ProgressReportController extends Controller
{
    private $progress_report;

    public function __construct(ProgressReportRepository $progress_report)
    {
        $this->progress_report = $progress_report;
        $this->destinationpath = 'uploads/projects/progressreports/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('projects::ProgressReport.index')
        ->withProgressReports($this->progress_report->getLatest());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('projects::ProgressReport.create');
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
            $new_file_name = "progress_report_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $progress_report = $this->progress_report->create($data);
        if($progress_report){
            return redirect()->route('admin.projects.progressreport.index')
                        ->withSuccessMessage('Progress Report is added successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Progress Report can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('projects::ProgressReport.edit')
        ->withProgressReport($this->progress_report->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $progress_report = $this->progress_report->find($id);
        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $progress_report->attachment) &&  $progress_report->attachment != '') {
                unlink($this->destinationpath . $progress_report->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "progress_report_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $progress_report = $this->progress_report->update($id, $data);
        if($progress_report){
            return redirect()->route('admin.projects.progressreport.index')
                        ->withSuccessMessage('Progress Report is update successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Progress Report can not be update.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $progress_report = $this->progress_report->find($id);
        $previousAttachment = $progress_report->attachment;
        $flag = $this->progress_report->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }
            return response()->json([
                'type' => 'success',
                'message' => 'Progress Report is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Progress Report can not be deleted.',
        ], 422);
    }
}
