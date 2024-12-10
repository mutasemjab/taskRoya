<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions_admin = [


            'role-table',
            'role-add',
            'role-edit',
            'role-delete',

            'employee-table',
            'employee-add',
            'employee-edit',
            'employee-delete',

            'customer-table',
            'customer-add',
            'customer-edit',
            'customer-delete',
          
            'category-table',
            'category-add',
            'category-edit',
            'category-delete',

            'type-table',
            'type-add',
            'type-edit',
            'type-delete',


            'product-table',
            'product-add',
            'product-edit',
            'product-delete',
      
            'episode-table',
            'episode-add',
            'episode-edit',
            'episode-delete',

            

        ];

         foreach ($permissions_admin as $permission_ad) {
            Permission::create(['name' => $permission_ad, 'guard_name' => 'admin']);
        }
    }
}
