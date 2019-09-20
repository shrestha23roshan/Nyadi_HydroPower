<?php

namespace Modules\AboutUs\Entities;

use Illuminate\Database\Eloquent\Model;

class BOD extends Model
{
    protected $table = 'bods';
    
    protected $fillable = [
        'name',
        'post',
        'description',
        'attachment',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
