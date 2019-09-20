<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    protected $fillable = [
        'title',
        'attachment',
        'is_active',
        'meta_title',
        'meta_tags',
        'meta_description',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];
}
