<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;

class MenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $main = Menu::create(['name' => 'mainMenu','active'=>1]);
        $admin = Menu::create(['name' => 'adminMenu','active'=>1]);

        $home = new menuItem(['title' => 'Home','link' => '/', 'active'=>1]);
        $home->menu()->associate( $main );

        $homeAdmin = new menuItem(['title' => 'Home','link' => '/admin', 'active'=>1]);
        $homeAdmin->menu()->associate( $admin );

        $home->save();
        $homeAdmin->save();
    }
}
