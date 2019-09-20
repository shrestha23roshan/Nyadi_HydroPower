<?php

namespace Modules\Popup\Entities;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $table = 'popup';
    
    protected $fillable = [
        'title',
        'attachment',
        'date',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];
}
