<?php

namespace Modules\Menu\Entities;

use Modules\Core\Entities\BaseModel;

class Menu extends BaseModel
{
    protected $fillable = ['name','active'];

    public function items(){

    	return $this->hasMany('Modules\Menu\Entities\MenuItem');

    }
}
