<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement("SET FOREIGN_KEY_CHECKS = 0");
        \DB::table("roles")->truncate();
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('user','admin');
    }
}
