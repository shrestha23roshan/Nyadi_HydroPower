<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Pages\Repositories\Page\PageRepository;
use Modules\Pages\Http\Requests\Page\StoreRequest;
use Modules\Pages\Http\Requests\Page\UpdateRequest;

class PagesController extends Controller
{
    private $pages;

    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;
        $this->destinationpath = 'uploads/pages/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('pages::Page.index')
            ->with('parent_pages', $this->pages->getParentPages(0))
            ->with('child_pages', $this->pages->getChildPages(0));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pages::Page.create')
        ->withParents($this->pages->findByParentId(0));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('attachment', 'file');
        $imageFile = $request->attachment;
        $imageFiles = $request->file;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "page_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name . $extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        if ($imageFiles) {
            $extension = $imageFiles->getClientOriginalName();
            // $new_file_name = "_" . time();
            $attachment = $imageFiles->move($this->destinationpath, $extension);
            $data['file'] = isset($attachment) ? $extension : NULL;
        }

        $pages = $this->pages->create($data);

        if ($pages) {
            return redirect()->route('admin.pages.index')
                ->withSuccessMessage('Page is added successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Page can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('pages::Page.edit')
        ->withPage($this->pages->find($id))
        ->withParents($this->pages->findByParentId(0));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment', 'file');
        $page = $this->pages->find($id);

        $imageFile = $request->attachment;
        $imageFiles = $request->file;
        if ($imageFile) {
            if (file_exists($this->destinationpath . $page->attachment) && $page->attachment != '') {
                unlink($this->destinationpath . $page->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "page_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name . $extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        if ($imageFiles) {
            if (file_exists($this->destinationpath . $page->file) && $page->file != '') {
                unlink($this->destinationpath . $page->file);
            }
            $extension = $imageFiles->getClientOriginalName();
            // $new_file_name = "_" . time();
            $attachment = $imageFiles->move($this->destinationpath, $extension);
            $data['file'] = isset($attachment) ? $extension : NULL;
        }

        $page = $this->pages->update($id, $data);

        if ($page) {
            return redirect()->route('admin.pages.index')
                ->withSuccessMessage('Page is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Page can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $page = $this->pages->find($id);
        $previousAttachment = $page->attachment;

        $flag = $this->pages->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Page is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Page can not deleted.',
        ], 422);
    }
}
