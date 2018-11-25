<?php

namespace Modules\Menu\Entities;

use Modules\Core\Entities\BaseModel;

class MenuItem extends BaseModel
{
    protected $fillable = ['title','link','menu_id','parent_id','active'];

    public function parent(){
    	return $this->belongsTo('Modules\Menu\Entities\MenuItem');
    }

    public function menu(){
    	return $this->belongsTo('Modules\Menu\Entities\Menu');
    }

    public function children(){
    	return $this->hasMany('Modules\Menu\Entities\MenuItem');
    }
}
