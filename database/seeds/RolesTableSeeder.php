<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title_ar' => 'Admin',
                'title_en' => 'Admin',
            ],
            [
                'id'    => 2,
                'title_ar' => 'User',
                'title_en' => 'User',
            ],
        ];

        Role::insert($roles);
    }
}
