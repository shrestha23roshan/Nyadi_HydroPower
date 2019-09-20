<?php

namespace Modules\Popup\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Popup\Repositories\Popup\PopupRepository;
use Modules\Popup\Http\Requests\Popup\StoreRequest;
use Modules\Popup\Http\Requests\Popup\UpdateRequest;

class PopupController extends Controller
{
    private $popup;

    public function __construct(PopupRepository $popup)
    {
        $this->popup = $popup;
        $this->destinationpath = 'uploads/popup/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('popup::Popup.index')
        ->withPopup($this->popup->all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('popup::Popup.create');
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
            $new_file_name = "popup_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $popup = $this->popup->create($data);

        if($popup){
            return redirect()->route('admin.popup.index')
                        ->withSuccessMessage('popup is added successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('popup can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('popup::Popup.edit')
        ->withPopup($this->popup->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $popup = $this->popup->find($id);

        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $popup->attachment) &&  $popup->attachment != '') {
                unlink($this->destinationpath . $popup->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "popup_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $popup = $this->popup->update($id, $data);

        if($popup){
            return redirect()->route('admin.popup.index')
                        ->withSuccessMessage('popup is update successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('popup can not be update.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $popup = $this->popup->find($id);
        $previousAttachment = $popup->attachment;

        $flag = $this->popup->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'popup is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'popup can not be deleted.',
        ], 422);
    }
}
