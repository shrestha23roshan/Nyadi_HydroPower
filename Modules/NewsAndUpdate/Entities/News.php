<?php

namespace Modules\NewsAndUpdate\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'heading',
        'date',
        'attachment',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];
     protected $hidden = ['created_at', 'updated_at'];
}
