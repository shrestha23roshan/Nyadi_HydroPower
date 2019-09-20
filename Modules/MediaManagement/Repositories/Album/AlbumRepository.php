<?php
namespace Modules\MediaManagement\Repositories\Album;

interface AlbumRepository
{
    public function all();

    public function getActive();

    public function findBySlug($slug);

    public function getMainAlbumId($id);
}