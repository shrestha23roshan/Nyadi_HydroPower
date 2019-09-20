<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Projects\Repositories\NHP\NHPRepository;
use Modules\Projects\Http\Requests\NHP\StoreRequest;
use Modules\Projects\Http\Requests\NHP\UpdateRequest;

class NHPController extends Controller
{
    private $nhp;

    public function __construct(NHPRepository $nhp)
    {
        $this->nhp = $nhp;
        $this->destinationpath = 'uploads/projects/nhp/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('projects::NHP.index')
        ->withNhp($this->nhp->all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('projects::NHP.create');
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
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "nhp_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $nhp = $this->nhp->create($data);
        if ($nhp) {
            return redirect()->route('admin.projects.nhp.index')
            ->withSuccessMessage('Nhp is added successfully.');
        }
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Nhp can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('projects::NHP.edit')
        ->withNhp($this->nhp->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $nhp = $this->nhp->find($id);
        $imageFile = $request->attachment;
        if ($imageFile) {
            if (file_exists($this->destinationpath . $nhp->attachment) &&  $nhp->attachment != '') {
                unlink($this->destinationpath . $nhp->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "nhp_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : null;
        }
        
        $nhp = $this->nhp->update($id, $data);
        if($nhp){
            return redirect()->route('admin.projects.nhp.index')
                ->withSuccessMessage('Nhp is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Nhp can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        
        $nhp = $this->nhp->find($id);
        $previousAttachment = $nhp->attachment;

        $flag = $this->nhp->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Nhp is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Nhp can not be deleted.',
        ], 422);
    }
}
