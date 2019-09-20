<?php

namespace Modules\MediaManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaManagement\Repositories\Album\AlbumRepository;
use Modules\MediaManagement\Repositories\AlbumPhoto\AlbumPhotoRepository;
use Illuminate\Support\Facades\Session;

class AlbumPhotoController extends Controller
{
    private $album;
    private $album_photo;

    public function __construct(AlbumRepository $album,AlbumPhotoRepository $album_photo)
    {
        $this->album = $album;
        $this->album_photo = $album_photo;
        $this->destinationpath = 'uploads/media-management/album/photos/';

    }
   
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {
        return view('mediamanagement::AlbumPhoto.create')
        ->withAlbum($this->album->find($id));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request , $id)
    {
        $photos = $request->file('file');
        if($photos) {
            $albumPhoto = null;
            foreach($photos as $album_photo){
                /** separate extension, move to directory and store name in database  */
                $extension = strrchr($album_photo->getClientOriginalName(), '.');
                $new_file_name = "album-photo_" . sha1(date('YmdHis') . str_random(30));;
                $attachment = $album_photo->move($this->destinationpath, $new_file_name.$extension);
                $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;

                /** work id */
                $data['album_id'] = $id;

                /** New work photo is created here */
                $albumPhoto = $this->album_photo->create($data);
            }

            if($albumPhoto){
                Session::flash('success_message', 'Photo is added successfully.');
                return response()->json([
                    'type' => 'success',
                    'message' => 'Photo is added successfully.',
                ], 200);
            }

            Session::flash('error_message', 'Photo can not added, please try again later.');
            return response()->json([
                'type' => 'error',
                'message' => 'Photo can not added, please try again later.'
            ], 200);
        }

        Session::flash('error_message', 'Photo can not added, please try again later.');
        return response()->json([
            'type' => 'error',
            'message' => 'Photo can not added, please try again later.'
        ], 200);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        return view('mediamanagement::AlbumPhoto.show')
        ->withPhotos($this->album_photo->findByAlbumId($id))
        ->withAlbum($this->album->find($id));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $album_photo = $this->album_photo->find($id);
        $previousAttachment = $album_photo->attachment;

        $flag = $this->album_photo->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Photo is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Photo can not be deleted.',
        ], 422);
    }
}
