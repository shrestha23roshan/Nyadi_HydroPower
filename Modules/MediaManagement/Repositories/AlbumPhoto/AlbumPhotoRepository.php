<?php
namespace Modules\MediaManagement\Repositories\AlbumPhoto;

interface AlbumPhotoRepository
{
    public function all();
    public function findByAlbumId($id);
    // public function getId($id);
}