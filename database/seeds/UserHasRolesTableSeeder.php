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
                'user_id' => 1,
            ),
        ));
        
        
    }
}