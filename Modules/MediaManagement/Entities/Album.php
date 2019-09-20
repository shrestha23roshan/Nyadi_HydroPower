<?php

namespace Modules\MediaManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Album extends Model
{
    use Sluggable;

    protected $fillable = [
        'main_album_id',
        'name',
        'slug',
        'attachment',
        'is_active',
        'created_by',
        'updated_by',
        'show_on'
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
                'source' => 'name'
            ]
        ];
    }

    public function photos()
    {
        return $this->hasMany(AlbumPhoto::class, 'album_id');
    }
}
