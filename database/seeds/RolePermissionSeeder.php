<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'mechanic']);
        Role::create(['name'=>'rider']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'customer_care']);
        Permission::create(['name'=>'all_privillge']);
        Permission::create(['name'=>'logistic']);
        Permission::create(['name'=>'repair']);

    }
}
