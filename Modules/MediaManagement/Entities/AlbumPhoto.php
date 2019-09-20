<?php

namespace Modules\MediaManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
    protected $fillable = [
        'album_id',
        'attachment',
        'created_by',
        'updated_by',
    ];

    protected $hidden = ['created_at','updated_at'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
