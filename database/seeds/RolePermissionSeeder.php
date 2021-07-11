<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

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
        $rider=Role::create(['name'=>'rider']);
        $admin=Role::create(['name'=>'admin']);
        Role::create(['name'=>'customer_care']);
        Permission::create(['name'=>'all_privillge']);
        Permission::create(['name'=>'logistic']);
        Permission::create(['name'=>'repair']);

        $user1=User::create([
            'name'=>"JHAMAK",
            'email'=>'jhamak@kumari.com',
            'password'=>bcrypt('passwword')
        ]);
        $user2=User::create([
            'name'=>'ajahi',
            'email'=>'himali@gmail.com',
            'password'=>bcrypt('passwword')
        ]);
        $role_user = [

            [
                'user_id' => $user1->id,
                'role_id' => $admin->id
            ],
            [
                'user_id' => $user2->id,
                'role_id' => $rider->id
            ]
        ];
        
        DB::table('role_user')->insert($role_user);
    }
}
