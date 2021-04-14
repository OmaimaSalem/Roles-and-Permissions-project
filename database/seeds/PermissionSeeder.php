<?php

use Illuminate\Database\Seeder;
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
        $permissions = [
            'role-list',
            'role-show',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-show',
            'user-create',
            'user-edit',
            'user-delete',

            'ticket-list',
            'ticket-show',
            'ticket-create',
            'ticket-edit',
            'ticket-delete',
            'ticket-open',
            'ticket-close',
            'ticket-reopen',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            Permission::create(['slug' => $permission]);
        }
    }
}
