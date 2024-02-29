<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'title' => 'client_management_access',
            ],
            [
                'id' => 2,
                'title' => 'permission_create',
            ],
            [
                'id' => 3,
                'title' => 'permission_edit',
            ],
            [
                'id' => 4,
                'title' => 'permission_show',
            ],
            [
                'id' => 5,
                'title' => 'permission_delete',
            ],
            [
                'id' => 6,
                'title' => 'permission_access',
            ],
            [
                'id' => 7,
                'title' => 'role_create',
            ],
            [
                'id' => 8,
                'title' => 'role_edit',
            ],
            [
                'id' => 9,
                'title' => 'role_show',
            ],
            [
                'id' => 10,
                'title' => 'role_delete',
            ],
            [
                'id' => 11,
                'title' => 'role_access',
            ],
            [
                'id' => 12,
                'title' => 'client_create',
            ],
            [
                'id' => 13,
                'title' => 'client_edit',
            ],
            [
                'id' => 14,
                'title' => 'client_show',
            ],
            [
                'id' => 15,
                'title' => 'client_delete',
            ],
            [
                'id' => 16,
                'title' => 'client_access',
            ],
            [
                'id' => 17,
                'title' => 'permissions_categories_create',
            ],
            [
                'id' => 18,
                'title' => 'permissions_categories_edit',
            ],
            [
                'id' => 19,
                'title' => 'permissions_categories_show',
            ],
            [
                'id' => 20,
                'title' => 'permissions_categories_delete',
            ],
            [
                'id' => 21,
                'title' => 'permissions_categories_access',
            ],
            [
                'title' => 'countries_access'
            ],
            [
                'title' => 'countries_create'
            ],
            [
                'title' => 'countries_edit'
            ],
            [
                'title' => 'countries_show'
            ],
            [
                'title' => 'countries_delete'
            ],
        ];

        Permission::insert($permissions);
    }
}
