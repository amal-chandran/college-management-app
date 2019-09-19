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
                'password' => '$2y$10$YzOcHlUN0cMGrx5mF4T6vOudPVyVFaDxra2A/hqJBfEp9WLL9zG4S',
                'remember_token' => 'WZ1BNTQExodLShbGVPXX2hiuVKdnkuXDxz7P10OiP4LUAhJspN9UbKhwYF0Q',
                'created_at' => '2019-11-13 05:32:01',
                'updated_at' => '2019-11-15 04:13:17',
            ),
            1 => 
            array (
                'id' => 9,
                'name' => 'Teacher',
                'email' => 'teacher@localhost.com',
                'password' => '$2y$10$zB.s0/swrCFJGltaZk1zZOAvnnLqoao84DSUp4.UlzTnSmqOjHHYG',
                'remember_token' => 'ujofxXoakoUiOgVbRzDzK1ebTJ4aIRRFjLhj7r1GcmAAgjySY9dbibQHBtii',
                'created_at' => '2019-11-15 04:12:59',
                'updated_at' => '2019-11-15 04:12:59',
            ),
            2 => 
            array (
                'id' => 11,
                'name' => 'Student',
                'email' => 'student@localhost.com',
                'password' => '$2y$10$dgixg8eOdIqeth/YRoLwNOHXp.dcvWsNxgBtt4nrYPXLDy29yMgkC',
                'remember_token' => 'i9JF1UDCWX8CM3ALQizJxQXiMKDTxukSfa3611AMjbpD9PcbDrzih7XTRXId',
                'created_at' => '2019-11-15 04:14:27',
                'updated_at' => '2019-11-15 04:14:27',
            ),
            3 => 
            array (
                'id' => 13,
                'name' => 'Class Teacher',
                'email' => 'classteacher@localhost.com',
                'password' => '$2y$10$PFVLB23R9fpiflp8eSRAsOGrL3XUQ1d7RvQLknY1nji4auzWTIOoK',
                'remember_token' => 'Y4X4hO0i3mz086t2YrYjY2n9gQSX7BV7zdjOPYeE03u0Wjy0tFlb6xuHCxkL',
                'created_at' => '2019-11-15 04:18:05',
                'updated_at' => '2019-11-15 04:18:05',
            ),
        ));
        
        
    }
}