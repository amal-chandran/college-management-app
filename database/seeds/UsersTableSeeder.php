<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@localhost.com',
                'password' => '$2y$10$oXA3hxAMBDMFWBsDBQGw4.h1lJ0KFci4JjGyMSfKyKyO3u/8xksHW',
                'remember_token' => '5QN51r10gWVooRG7zhM5yIukXjp1S7OztNxmvsc62s2CQKsdBjmquGeJdcsp',
                'created_at' => '2019-11-17 21:00:29',
                'updated_at' => '2019-11-17 22:23:23',
            ),
        ));
        
        
    }
}