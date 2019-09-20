<?php

namespace Modules\Pages\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    use Sluggable;
    
    protected $fillable = [
        'parent_id',
        'heading',
        'slug',
        'attachment',
        'file',
        'description',
        'title',
        'meta_tags',
        'meta_description',
        'order_position',
        'is_active',
        'deletable',
        'created_by',
        'updated_by'
    ];

    /**
     * Attributes excluded fromt the model's JSON form.
     * 
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
    
    /**
     * Return the sluggable configuration array for the model.
     * 
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'heading'
            ]
        ];
    }

    /**
     * Get the parent that owns the page.
     */
    public function parent()
    {
        return $this->belongsTo('Modules\Pages\Entities\Page', 'parent_id');
    }

    /**
     * Get the childrens for the page.
     */
    public function childrens()
    {
        return $this->hasMany('Modules\Pages\Entities\Page', 'parent_id');
    }

    /**
     * Get active childrens for the page.
     */
    public function activeChildrens()
    {
        return $this->childrens()->where('is_active', '1');
    }
}
