<?php

namespace Modules\MediaManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class MainAlbum extends Model
{
    protected $fillable = [
        'name',
        'attachment',
        'is_active'
    ];

    protected $hidden =['created_at', 'updated_at'];
}
