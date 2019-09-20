<?php

namespace Modules\MediaManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Video extends Model
{
    use Sluggable;
    
    protected $fillable = [
        'title',
        'description',
        'video_url',
        'slug',
        'meta_title',
        'meta_tags',
        'meta_description',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at', 'updated_at'];

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
