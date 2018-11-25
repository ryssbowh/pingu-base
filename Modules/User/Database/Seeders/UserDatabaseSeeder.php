<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Entities\BaseModel;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;


class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BaseModel::unguard();

        $role = Role::create(['name' => 'admin']);
        Role::create(['name' => 'member']);
        $user = User::create([
            'name' => 'Admin', 
            'email' => 'eskimo@weareeveryone.com',
            'password' => bcrypt('r00fsp4c3'),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        $user->roles()->attach($role);
    }
}
