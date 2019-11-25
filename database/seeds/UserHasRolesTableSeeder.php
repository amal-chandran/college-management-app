<?php

use Illuminate\Database\Seeder;

class UserHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_has_roles')->delete();
        
        \DB::table('user_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 11,
            ),
            1 => 
            array (
                'role_id' => 1,
                'user_id' => 17,
            ),
            2 => 
            array (
                'role_id' => 3,
                'user_id' => 9,
            ),
            3 => 
            array (
                'role_id' => 4,
                'user_id' => 1,
            ),
            4 => 
            array (
                'role_id' => 6,
                'user_id' => 14,
            ),
            5 => 
            array (
                'role_id' => 7,
                'user_id' => 13,
            ),
        ));
        
        
    }
}