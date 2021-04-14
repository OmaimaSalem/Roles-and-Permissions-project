<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'omaima',
            'email' => 'omaimasalem@gmail.com',
            'password' => bcrypt('123456789'),
            
        
        ]);
        
        $role = Role::create(['role_name' => 'Super Admin']);
       
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }
}
