<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $newUser = new User();
        $newUser->name = 'Admin';
        $newUser->email = 'admin@test.com';
        $newUser->password = bcrypt('admin');
        $newUser->save();

        $newUser->assignRole('Administrator');


    }
}
