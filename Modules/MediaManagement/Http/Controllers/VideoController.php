<?php

namespace Modules\MediaManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaManagement\Repositories\Video\VideoRepository;
use Modules\MediaManagement\Http\Requests\Video\StoreRequest;
use Modules\MediaManagement\Http\Requests\Video\UpdateRequest;

class VideoController extends Controller
{
    private $video;

    public function __construct(VideoRepository $video)
    {
        $this->video = $video;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('mediamanagement::Video.index')
        ->withVideos($this->video->all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('mediamanagement::Video.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('video_url');

        $videoUrl = $request->video_url;
        parse_str( parse_url( $videoUrl, PHP_URL_QUERY ), $my_array_of_vars );
        $data['video_url'] = $my_array_of_vars['v'];

        $video = $this->video->create($data);

        if($video){
            return redirect()->route('admin.media-management.video.index')
                        ->withSuccessMessage('Video is added successfully.');
        }

        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Video can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('mediamanagement::Video.edit')
        ->withVideo($this->video->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('video_url');

        $videoUrl = $request->video_url;
        if($videoUrl){
            parse_str( parse_url( $videoUrl, PHP_URL_QUERY ), $my_array_of_vars );
            $data['video_url'] = $my_array_of_vars['v'];
        }

        $video = $this->video->update($id, $data);

        if($video) {
            return redirect()->route('admin.media-management.video.index')
                        ->withSuccessMessage('Video is updated successfully.');
        }

        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Video can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $flag = $this->video->destroy($id);
        if ($flag) {
            return response()->json([
                'type' => 'success',
                'message' => 'Video is deleted successfully.'
            ], 200);
        }
        return response()->json([
                'type' => 'error',
                'message' => 'Video can not be deleted.'
            ], 422);
    }
}
