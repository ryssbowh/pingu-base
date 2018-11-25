<?php

namespace Modules\User\Entities;

use Modules\Core\Entities\BaseModel;

class Role extends BaseModel
{
    protected $fillable = ['name'];

    /**
     * get users associated to this role
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
    	return $this->belongsToMany('Modules\User\Entities\User')->withTimestamps();
    }
}
