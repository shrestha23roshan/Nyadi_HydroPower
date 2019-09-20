<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;

class NHP extends Model
{
    protected $table = 'nhp';
    
    protected $fillable = [
        'title',
        'description',
        'attachment',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
