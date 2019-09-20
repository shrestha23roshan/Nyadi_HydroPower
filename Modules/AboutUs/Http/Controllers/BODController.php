<?php

namespace Modules\AboutUs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AboutUs\Repositories\BOD\BodRepository;
use Modules\AboutUs\Http\Requests\BOD\StoreRequest;
use Modules\AboutUs\Http\Requests\BOD\UpdateRequest;

class BODController extends Controller
{
    private $bod;

    public function __construct(BodRepository $bod)
    {
        $this->bod = $bod;
        $this->destinationpath = 'uploads/aboutus/bod/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('aboutus::BOD.index')
        ->withBods($this->bod->getLatest());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('aboutus::BOD.create');
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
            $new_file_name = "bod_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $bod = $this->bod->create($data);
        if ($bod) {
            return redirect()->route('admin.about-us.bod.index')
            ->withSuccessMessage('Board of director is added successfully.');
        }
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Board of director can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('aboutus::BOD.edit')
        ->withBod($this->bod->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $bod = $this->bod->find($id);

        $imageFile = $request->attachment;
        if ($imageFile) {
            if (file_exists($this->destinationpath . $bod->attachment) &&  $bod->attachment != '') {
                unlink($this->destinationpath . $bod->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "bod_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : null;
        }
        
        $bod = $this->bod->update($id, $data);
        if($bod){
            return redirect()->route('admin.about-us.bod.index')
                ->withSuccessMessage('Board of Director is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Board of Director can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $bod = $this->bod->find($id);
        $previousAttachment = $bod->attachment;

        $flag = $this->bod->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Board of Director is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Board of Director can not be deleted.',
        ], 422);
    }
}
