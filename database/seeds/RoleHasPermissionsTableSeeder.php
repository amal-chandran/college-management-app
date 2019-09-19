<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 3,
            ),
            1 => 
            array (
                'permission_id' => 1,
                'role_id' => 4,
            ),
            2 => 
            array (
                'permission_id' => 1,
                'role_id' => 5,
            ),
            3 => 
            array (
                'permission_id' => 2,
                'role_id' => 3,
            ),
            4 => 
            array (
                'permission_id' => 2,
                'role_id' => 4,
            ),
            5 => 
            array (
                'permission_id' => 2,
                'role_id' => 5,
            ),
            6 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 3,
                'role_id' => 3,
            ),
            8 => 
            array (
                'permission_id' => 3,
                'role_id' => 4,
            ),
            9 => 
            array (
                'permission_id' => 3,
                'role_id' => 5,
            ),
            10 => 
            array (
                'permission_id' => 4,
                'role_id' => 3,
            ),
            11 => 
            array (
                'permission_id' => 4,
                'role_id' => 4,
            ),
            12 => 
            array (
                'permission_id' => 4,
                'role_id' => 5,
            ),
            13 => 
            array (
                'permission_id' => 5,
                'role_id' => 4,
            ),
            14 => 
            array (
                'permission_id' => 5,
                'role_id' => 5,
            ),
            15 => 
            array (
                'permission_id' => 6,
                'role_id' => 4,
            ),
            16 => 
            array (
                'permission_id' => 7,
                'role_id' => 4,
            ),
            17 => 
            array (
                'permission_id' => 8,
                'role_id' => 3,
            ),
            18 => 
            array (
                'permission_id' => 8,
                'role_id' => 4,
            ),
            19 => 
            array (
                'permission_id' => 8,
                'role_id' => 5,
            ),
            20 => 
            array (
                'permission_id' => 9,
                'role_id' => 4,
            ),
            21 => 
            array (
                'permission_id' => 9,
                'role_id' => 5,
            ),
            22 => 
            array (
                'permission_id' => 10,
                'role_id' => 4,
            ),
            23 => 
            array (
                'permission_id' => 10,
                'role_id' => 5,
            ),
            24 => 
            array (
                'permission_id' => 11,
                'role_id' => 4,
            ),
            25 => 
            array (
                'permission_id' => 11,
                'role_id' => 5,
            ),
            26 => 
            array (
                'permission_id' => 12,
                'role_id' => 4,
            ),
            27 => 
            array (
                'permission_id' => 12,
                'role_id' => 5,
            ),
            28 => 
            array (
                'permission_id' => 13,
                'role_id' => 3,
            ),
            29 => 
            array (
                'permission_id' => 13,
                'role_id' => 4,
            ),
            30 => 
            array (
                'permission_id' => 13,
                'role_id' => 5,
            ),
            31 => 
            array (
                'permission_id' => 14,
                'role_id' => 3,
            ),
            32 => 
            array (
                'permission_id' => 14,
                'role_id' => 4,
            ),
            33 => 
            array (
                'permission_id' => 14,
                'role_id' => 5,
            ),
            34 => 
            array (
                'permission_id' => 15,
                'role_id' => 3,
            ),
            35 => 
            array (
                'permission_id' => 15,
                'role_id' => 4,
            ),
            36 => 
            array (
                'permission_id' => 15,
                'role_id' => 5,
            ),
            37 => 
            array (
                'permission_id' => 16,
                'role_id' => 3,
            ),
            38 => 
            array (
                'permission_id' => 16,
                'role_id' => 4,
            ),
            39 => 
            array (
                'permission_id' => 16,
                'role_id' => 5,
            ),
            40 => 
            array (
                'permission_id' => 17,
                'role_id' => 3,
            ),
            41 => 
            array (
                'permission_id' => 17,
                'role_id' => 4,
            ),
            42 => 
            array (
                'permission_id' => 17,
                'role_id' => 5,
            ),
            43 => 
            array (
                'permission_id' => 18,
                'role_id' => 3,
            ),
            44 => 
            array (
                'permission_id' => 18,
                'role_id' => 4,
            ),
            45 => 
            array (
                'permission_id' => 18,
                'role_id' => 5,
            ),
            46 => 
            array (
                'permission_id' => 19,
                'role_id' => 3,
            ),
            47 => 
            array (
                'permission_id' => 19,
                'role_id' => 4,
            ),
            48 => 
            array (
                'permission_id' => 19,
                'role_id' => 5,
            ),
            49 => 
            array (
                'permission_id' => 20,
                'role_id' => 4,
            ),
            50 => 
            array (
                'permission_id' => 20,
                'role_id' => 5,
            ),
            51 => 
            array (
                'permission_id' => 21,
                'role_id' => 4,
            ),
            52 => 
            array (
                'permission_id' => 21,
                'role_id' => 5,
            ),
            53 => 
            array (
                'permission_id' => 22,
                'role_id' => 4,
            ),
            54 => 
            array (
                'permission_id' => 22,
                'role_id' => 5,
            ),
            55 => 
            array (
                'permission_id' => 23,
                'role_id' => 4,
            ),
            56 => 
            array (
                'permission_id' => 23,
                'role_id' => 5,
            ),
            57 => 
            array (
                'permission_id' => 24,
                'role_id' => 3,
            ),
            58 => 
            array (
                'permission_id' => 24,
                'role_id' => 4,
            ),
            59 => 
            array (
                'permission_id' => 24,
                'role_id' => 5,
            ),
            60 => 
            array (
                'permission_id' => 25,
                'role_id' => 4,
            ),
            61 => 
            array (
                'permission_id' => 26,
                'role_id' => 4,
            ),
            62 => 
            array (
                'permission_id' => 27,
                'role_id' => 4,
            ),
            63 => 
            array (
                'permission_id' => 28,
                'role_id' => 4,
            ),
            64 => 
            array (
                'permission_id' => 29,
                'role_id' => 3,
            ),
            65 => 
            array (
                'permission_id' => 29,
                'role_id' => 4,
            ),
            66 => 
            array (
                'permission_id' => 29,
                'role_id' => 5,
            ),
            67 => 
            array (
                'permission_id' => 30,
                'role_id' => 3,
            ),
            68 => 
            array (
                'permission_id' => 30,
                'role_id' => 4,
            ),
            69 => 
            array (
                'permission_id' => 30,
                'role_id' => 5,
            ),
            70 => 
            array (
                'permission_id' => 31,
                'role_id' => 3,
            ),
            71 => 
            array (
                'permission_id' => 31,
                'role_id' => 4,
            ),
            72 => 
            array (
                'permission_id' => 31,
                'role_id' => 5,
            ),
            73 => 
            array (
                'permission_id' => 32,
                'role_id' => 3,
            ),
            74 => 
            array (
                'permission_id' => 32,
                'role_id' => 4,
            ),
            75 => 
            array (
                'permission_id' => 32,
                'role_id' => 5,
            ),
            76 => 
            array (
                'permission_id' => 33,
                'role_id' => 3,
            ),
            77 => 
            array (
                'permission_id' => 33,
                'role_id' => 4,
            ),
            78 => 
            array (
                'permission_id' => 33,
                'role_id' => 5,
            ),
            79 => 
            array (
                'permission_id' => 34,
                'role_id' => 3,
            ),
            80 => 
            array (
                'permission_id' => 34,
                'role_id' => 4,
            ),
            81 => 
            array (
                'permission_id' => 34,
                'role_id' => 5,
            ),
            82 => 
            array (
                'permission_id' => 35,
                'role_id' => 4,
            ),
            83 => 
            array (
                'permission_id' => 35,
                'role_id' => 5,
            ),
            84 => 
            array (
                'permission_id' => 36,
                'role_id' => 4,
            ),
            85 => 
            array (
                'permission_id' => 36,
                'role_id' => 5,
            ),
            86 => 
            array (
                'permission_id' => 37,
                'role_id' => 4,
            ),
            87 => 
            array (
                'permission_id' => 37,
                'role_id' => 5,
            ),
            88 => 
            array (
                'permission_id' => 38,
                'role_id' => 4,
            ),
            89 => 
            array (
                'permission_id' => 38,
                'role_id' => 5,
            ),
            90 => 
            array (
                'permission_id' => 39,
                'role_id' => 4,
            ),
            91 => 
            array (
                'permission_id' => 39,
                'role_id' => 5,
            ),
        ));
        
        
    }
}