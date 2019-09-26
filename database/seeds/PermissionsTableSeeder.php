<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'view-users',
                'created_at' => '2019-11-17 20:59:46',
                'updated_at' => '2019-11-17 20:59:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'create-users',
                'created_at' => '2019-11-17 20:59:46',
                'updated_at' => '2019-11-17 20:59:46',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'edit-users',
                'created_at' => '2019-11-17 20:59:46',
                'updated_at' => '2019-11-17 20:59:46',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'update-users',
                'created_at' => '2019-11-17 20:59:46',
                'updated_at' => '2019-11-17 20:59:46',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'delete-users',
                'created_at' => '2019-11-17 20:59:46',
                'updated_at' => '2019-11-17 20:59:46',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'menu-dashboard',
                'created_at' => '2019-11-17 22:50:07',
                'updated_at' => '2019-11-17 22:50:07',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'menu-users',
                'created_at' => '2019-11-17 22:50:07',
                'updated_at' => '2019-11-17 22:50:07',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'menu-roles',
                'created_at' => '2019-11-17 22:50:07',
                'updated_at' => '2019-11-17 22:50:07',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'menu-permissions',
                'created_at' => '2019-11-17 22:50:07',
                'updated_at' => '2019-11-17 22:50:07',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'view-permissions',
                'created_at' => '2019-11-17 22:52:35',
                'updated_at' => '2019-11-17 22:52:35',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'create-permissions',
                'created_at' => '2019-11-17 22:52:35',
                'updated_at' => '2019-11-17 22:52:35',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'edit-permissions',
                'created_at' => '2019-11-17 22:52:35',
                'updated_at' => '2019-11-17 22:52:35',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'update-permissions',
                'created_at' => '2019-11-17 22:52:35',
                'updated_at' => '2019-11-17 22:52:35',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'delete-permissions',
                'created_at' => '2019-11-17 22:52:35',
                'updated_at' => '2019-11-17 22:52:35',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'view-roles',
                'created_at' => '2019-11-17 22:52:40',
                'updated_at' => '2019-11-17 22:52:40',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'create-roles',
                'created_at' => '2019-11-17 22:52:40',
                'updated_at' => '2019-11-17 22:52:40',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'edit-roles',
                'created_at' => '2019-11-17 22:52:40',
                'updated_at' => '2019-11-17 22:52:40',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'update-roles',
                'created_at' => '2019-11-17 22:52:40',
                'updated_at' => '2019-11-17 22:52:40',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'delete-roles',
                'created_at' => '2019-11-17 22:52:40',
                'updated_at' => '2019-11-17 22:52:40',
            ),
        ));
        
        
    }
}