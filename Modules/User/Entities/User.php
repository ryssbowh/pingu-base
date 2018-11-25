<?php

namespace Modules\User\Entities;

use Greabock\Tentacles\EloquentTentacle;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Core\Entities\BaseModel;

class User extends Authenticatable
{

	use Notifiable;
    use EloquentTentacle;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    /**
     * get roles associated to this user
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(){
    	return $this->belongsToMany('Modules\User\Entities\Role')->withTimestamps();
    }
}
