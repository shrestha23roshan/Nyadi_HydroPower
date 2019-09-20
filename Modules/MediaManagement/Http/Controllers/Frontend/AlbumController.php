<?php

namespace Modules\MediaManagement\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaManagement\Repositories\Album\AlbumRepository;
use Modules\MediaManagement\Repositories\AlbumPhoto\AlbumPhotoRepository;
use Modules\MediaManagement\Repositories\MainAlbum\MainAlbumRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class AlbumController extends Controller
{
    private $album;
    private $seo;
    private $album_photo;
    private $main_album;

    public function __construct(AlbumRepository $album, SeoRepository $seo,AlbumPhotoRepository $album_photo,MainAlbumRepository $main_album)
    {
        $this->album = $album;
        $this->seo = $seo;
        $this->album_photo = $album_photo;
        $this->main_album = $main_album;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('mediamanagement::Frontend.Album.index')
        ->withMainAlbums($this->main_album->all())
        ->withSeo($this->seo->findByField('page', 'photo'));

    }

    public function album()
    {
        return view('mediamanagement::Frontend.Album.album')
        ->withAlbums($this->album->getMainAlbumId(1))
        ->withSeo($this->seo->findByField('page', 'photo'));
    }

    public function album1()
    {
        return view('mediamanagement::Frontend.Album.albums')
        ->withAlbumss($this->album->getMainAlbumId(2))
        ->withSeo($this->seo->findByField('page', 'photo'));
    }

    public function photo($slug)
    {
        $album = $this->album->findBySlug($slug);

        return view('mediamanagement::Frontend.Album.photo')
        ->withAlbumPhotos($this->album_photo->findByAlbumId($album->id))
        ->withSeo($this->seo->findByField('page', 'photo'));
    }
}