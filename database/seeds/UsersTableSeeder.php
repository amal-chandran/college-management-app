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
                'password' => '$2y$10$L3zRp/A66/e9Qs.UaQtlOu8R4faxtmVCun5XT8X1GEc0Dlmh2RHL.',
                'remember_token' => 'cquRkKf1q82YmkXJsOguUUaEH7m0L7n2zYcUqx9sZliYOIQlS6sF1v9XzegI',
                'created_at' => '2019-11-13 05:32:01',
                'updated_at' => '2019-11-16 12:50:51',
            ),
            1 => 
            array (
                'id' => 9,
                'name' => 'Teacher',
                'email' => 'teacher@localhost.com',
                'password' => '$2y$10$YsRjyN9/9SUt/YLNZ2vbReKiXWnXfn78WHwouTRh8EFd6bSzeo/QG',
                'remember_token' => '80BEb3WRuoKKeiNhGlALWY5MxzO4B4S7fT3S7lZantm5yOc4ZtPh4o2pwPou',
                'created_at' => '2019-11-15 04:12:59',
                'updated_at' => '2019-11-16 12:51:02',
            ),
            2 => 
            array (
                'id' => 11,
                'name' => 'Student',
                'email' => 'student@localhost.com',
                'password' => '$2y$10$CZCJ7gKmBdWNRFvzaY4YN.Pab8EKyIkF7n.8j/Ig6i9jsCuUm8OU6',
                'remember_token' => 'rTGJNgaSgS0SJYcUJZBSAxgrLTZ8vi7JkByEf7MtKI7FGprkA25kZJd4dB8h',
                'created_at' => '2019-11-15 04:14:27',
                'updated_at' => '2019-11-16 12:51:18',
            ),
            3 => 
            array (
                'id' => 13,
                'name' => 'Class Teacher',
                'email' => 'classteacher@localhost.com',
                'password' => '$2y$10$Pp8pJBSr/ALLheSBbhDgc.3sKi94Hnk/7wCCE.rHS2cKGBTiMLmDy',
                'remember_token' => '6aSOFMJelS2VtHm4GbHxeefB3fvDoFPTVSEhbHkr49PNIA6NOJGumDQ1HqQr',
                'created_at' => '2019-11-15 04:18:05',
                'updated_at' => '2019-11-16 12:51:29',
            ),
            4 => 
            array (
                'id' => 14,
                'name' => 'HOD',
                'email' => 'hod@localhost.com',
                'password' => '$2y$10$42L2TB/Mo.MK/CY8Wg5I0.THshi9ZgmReWIuApBPaTjH5aiEGYXFm',
                'remember_token' => '3zXgvL5RAIfuQu5zCP4u3WeyuQLLl7Th6HADQv9gobtVkLozhm1YiWRJHHPO',
                'created_at' => '2019-11-16 10:01:34',
                'updated_at' => '2019-11-16 12:51:38',
            ),
        ));
        
        
    }
}