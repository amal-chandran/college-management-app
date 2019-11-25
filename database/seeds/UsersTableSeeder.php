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
                'remember_token' => 'BAfuiVtELEvoCOY8GAPM6g8Z8QP05jgPPrvhnndGq42JCqOOXKcLRw3w0UcS',
                'created_at' => '2019-11-13 05:32:01',
                'updated_at' => '2019-11-16 12:50:51',
            ),
            1 => 
            array (
                'id' => 9,
                'name' => 'Teacher',
                'email' => 'teacher@localhost.com',
                'password' => '$2y$10$YsRjyN9/9SUt/YLNZ2vbReKiXWnXfn78WHwouTRh8EFd6bSzeo/QG',
                'remember_token' => 'kEMwNRjx5sQvtNJtqfUGmYG9NUWqaDMlsLi3ai0waUt01WLRravqUKw9r8dP',
                'created_at' => '2019-11-15 04:12:59',
                'updated_at' => '2019-11-16 12:51:02',
            ),
            2 => 
            array (
                'id' => 11,
                'name' => 'Student',
                'email' => 'student@localhost.com',
                'password' => '$2y$10$CZCJ7gKmBdWNRFvzaY4YN.Pab8EKyIkF7n.8j/Ig6i9jsCuUm8OU6',
                'remember_token' => 'jVSKYfRug44HIfotbsi3niV1WbnjJEr4Uun0wzVTQSeE5EZzr9OBVIxPdtfC',
                'created_at' => '2019-11-15 04:14:27',
                'updated_at' => '2019-11-16 12:51:18',
            ),
            3 => 
            array (
                'id' => 13,
                'name' => 'Class Teacher',
                'email' => 'classteacher@localhost.com',
                'password' => '$2y$10$Pp8pJBSr/ALLheSBbhDgc.3sKi94Hnk/7wCCE.rHS2cKGBTiMLmDy',
                'remember_token' => '64Me5Dws7Eqd91vkK3pN3ssbXHMG9eTcrFErRB0fIgUu6pdAAgrZzSy9F1jR',
                'created_at' => '2019-11-15 04:18:05',
                'updated_at' => '2019-11-16 12:51:29',
            ),
            4 => 
            array (
                'id' => 14,
                'name' => 'HOD',
                'email' => 'hod@localhost.com',
                'password' => '$2y$10$42L2TB/Mo.MK/CY8Wg5I0.THshi9ZgmReWIuApBPaTjH5aiEGYXFm',
                'remember_token' => 'j3gj3kB0GKiN5karksMDXuX28IfZ2L4p5o4lYEAJmUCNsxb7NDfO0neqJ1aa',
                'created_at' => '2019-11-16 10:01:34',
                'updated_at' => '2019-11-16 12:51:38',
            ),
            5 => 
            array (
                'id' => 17,
                'name' => 'Student 2',
                'email' => 'student2@localhost.com',
                'password' => '$2y$10$Z1T45GYV2z4rmTcYINjHHeB2WovseNRShIg70VQGct7zONzQT3QyO',
                'remember_token' => NULL,
                'created_at' => '2019-11-25 00:37:19',
                'updated_at' => '2019-11-25 00:38:18',
            ),
        ));
        
        
    }
}