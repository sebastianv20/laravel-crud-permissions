<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //posts
        Permission::create(['name' => 'view_posts']);
        Permission::create(['name' => 'create_posts']);
        Permission::create(['name' => 'edit_posts']);
        Permission::create(['name' => 'destroy_posts']);

        //users
        Permission::create(['name' => 'view_users']);
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'edit_users']);

        //roles
        Permission::create(['name' => 'view_roles']);
        Permission::create(['name' => 'edit_roles']);


       $role = Role::create(['name' => 'Administrator']);
       $role->givePermissionTo(Permission::all());

       $role = Role::create(['name' => 'Poster']);
       $role->givePermissionTo(['view_posts','create_posts','edit_posts']);


    }
}
