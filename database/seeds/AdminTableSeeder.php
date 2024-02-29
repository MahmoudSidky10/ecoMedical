<?php

use App\Models\User;
use Database\Seeders\PermissionRoleTableSeeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\RoleUserTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          User::create([
            "user_type_id" => 1,
            "name" => "Super Admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("123456"),
        ]);
    }
}
