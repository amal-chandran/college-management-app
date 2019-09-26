<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2019-11-17 20:58:36',
                'updated_at' => '2019-11-17 20:58:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'normal-user',
                'created_at' => '2019-11-17 21:23:16',
                'updated_at' => '2019-11-17 21:23:16',
            ),
        ));
        
        
    }
}