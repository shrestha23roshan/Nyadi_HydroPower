<?php

namespace Modules\Configuration\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
     /**
     * Database table used by the model.
     * 
     * @var string
     */
    protected $table = 'modules';

    /**
     * Attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'module_name',
        'slug',
        'icon',
        'order_position',
        'is_active'
    ];

    /**
     * Attributes excluded from the model's JSON form.
     * 
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

     /**
     * Get parent module of the module
     */
    public function parent()
    {
        return $this->belongsTo('Modules\Configuration\Entities\Module', 'parent_id');
    }

    /**
     * Get all child modules that belong to the module.
     */
    public function childrens()
    {
        return $this->hasMany('Modules\Configuration\Entities\Module', 'parent_id');
    }

    /**
     * Get all roles that belong to the module.
     */
    public function roles()
    {
        return $this->belongsToMany('Modules\Configuration\Entities\Role', 'role_modules', 'role_id', 'module_id');
    }
}
