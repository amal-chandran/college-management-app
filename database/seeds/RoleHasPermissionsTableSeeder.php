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

        \DB::table('role_has_permissions')->insert(array(
            0 =>
            array(
                'permission_id' => 1,
                'role_id' => 3,
            ),
            1 =>
            array(
                'permission_id' => 1,
                'role_id' => 4,
            ),
            2 =>
            array(
                'permission_id' => 1,
                'role_id' => 6,
            ),
            3 =>
            array(
                'permission_id' => 1,
                'role_id' => 7,
            ),
            4 =>
            array(
                'permission_id' => 2,
                'role_id' => 3,
            ),
            5 =>
            array(
                'permission_id' => 2,
                'role_id' => 4,
            ),
            6 =>
            array(
                'permission_id' => 2,
                'role_id' => 6,
            ),
            7 =>
            array(
                'permission_id' => 2,
                'role_id' => 7,
            ),
            8 =>
            array(
                'permission_id' => 3,
                'role_id' => 1,
            ),
            9 =>
            array(
                'permission_id' => 3,
                'role_id' => 3,
            ),
            10 =>
            array(
                'permission_id' => 3,
                'role_id' => 4,
            ),
            11 =>
            array(
                'permission_id' => 3,
                'role_id' => 6,
            ),
            12 =>
            array(
                'permission_id' => 3,
                'role_id' => 7,
            ),
            13 =>
            array(
                'permission_id' => 4,
                'role_id' => 3,
            ),
            14 =>
            array(
                'permission_id' => 4,
                'role_id' => 4,
            ),
            15 =>
            array(
                'permission_id' => 4,
                'role_id' => 6,
            ),
            16 =>
            array(
                'permission_id' => 4,
                'role_id' => 7,
            ),
            17 =>
            array(
                'permission_id' => 5,
                'role_id' => 4,
            ),
            18 =>
            array(
                'permission_id' => 5,
                'role_id' => 6,
            ),
            19 =>
            array(
                'permission_id' => 6,
                'role_id' => 4,
            ),
            20 =>
            array(
                'permission_id' => 7,
                'role_id' => 4,
            ),
            21 =>
            array(
                'permission_id' => 8,
                'role_id' => 3,
            ),
            22 =>
            array(
                'permission_id' => 8,
                'role_id' => 4,
            ),
            23 =>
            array(
                'permission_id' => 8,
                'role_id' => 6,
            ),
            24 =>
            array(
                'permission_id' => 8,
                'role_id' => 7,
            ),
            25 =>
            array(
                'permission_id' => 9,
                'role_id' => 4,
            ),
            26 =>
            array(
                'permission_id' => 9,
                'role_id' => 6,
            ),
            27 =>
            array(
                'permission_id' => 10,
                'role_id' => 4,
            ),
            28 =>
            array(
                'permission_id' => 10,
                'role_id' => 6,
            ),
            29 =>
            array(
                'permission_id' => 11,
                'role_id' => 4,
            ),
            30 =>
            array(
                'permission_id' => 11,
                'role_id' => 6,
            ),
            31 =>
            array(
                'permission_id' => 12,
                'role_id' => 4,
            ),
            32 =>
            array(
                'permission_id' => 12,
                'role_id' => 6,
            ),
            33 =>
            array(
                'permission_id' => 13,
                'role_id' => 3,
            ),
            34 =>
            array(
                'permission_id' => 13,
                'role_id' => 4,
            ),
            35 =>
            array(
                'permission_id' => 13,
                'role_id' => 6,
            ),
            36 =>
            array(
                'permission_id' => 13,
                'role_id' => 7,
            ),
            37 =>
            array(
                'permission_id' => 14,
                'role_id' => 3,
            ),
            38 =>
            array(
                'permission_id' => 14,
                'role_id' => 4,
            ),
            39 =>
            array(
                'permission_id' => 14,
                'role_id' => 6,
            ),
            40 =>
            array(
                'permission_id' => 14,
                'role_id' => 7,
            ),
            41 =>
            array(
                'permission_id' => 15,
                'role_id' => 3,
            ),
            42 =>
            array(
                'permission_id' => 15,
                'role_id' => 4,
            ),
            43 =>
            array(
                'permission_id' => 15,
                'role_id' => 6,
            ),
            44 =>
            array(
                'permission_id' => 15,
                'role_id' => 7,
            ),
            45 =>
            array(
                'permission_id' => 16,
                'role_id' => 3,
            ),
            46 =>
            array(
                'permission_id' => 16,
                'role_id' => 4,
            ),
            47 =>
            array(
                'permission_id' => 16,
                'role_id' => 6,
            ),
            48 =>
            array(
                'permission_id' => 16,
                'role_id' => 7,
            ),
            49 =>
            array(
                'permission_id' => 17,
                'role_id' => 3,
            ),
            50 =>
            array(
                'permission_id' => 17,
                'role_id' => 4,
            ),
            51 =>
            array(
                'permission_id' => 17,
                'role_id' => 6,
            ),
            52 =>
            array(
                'permission_id' => 17,
                'role_id' => 7,
            ),
            53 =>
            array(
                'permission_id' => 18,
                'role_id' => 3,
            ),
            54 =>
            array(
                'permission_id' => 18,
                'role_id' => 4,
            ),
            55 =>
            array(
                'permission_id' => 18,
                'role_id' => 6,
            ),
            56 =>
            array(
                'permission_id' => 18,
                'role_id' => 7,
            ),
            57 =>
            array(
                'permission_id' => 19,
                'role_id' => 3,
            ),
            58 =>
            array(
                'permission_id' => 19,
                'role_id' => 4,
            ),
            59 =>
            array(
                'permission_id' => 19,
                'role_id' => 6,
            ),
            60 =>
            array(
                'permission_id' => 19,
                'role_id' => 7,
            ),
            61 =>
            array(
                'permission_id' => 20,
                'role_id' => 4,
            ),
            62 =>
            array(
                'permission_id' => 20,
                'role_id' => 6,
            ),
            63 =>
            array(
                'permission_id' => 21,
                'role_id' => 4,
            ),
            64 =>
            array(
                'permission_id' => 21,
                'role_id' => 6,
            ),
            65 =>
            array(
                'permission_id' => 22,
                'role_id' => 4,
            ),
            66 =>
            array(
                'permission_id' => 22,
                'role_id' => 6,
            ),
            67 =>
            array(
                'permission_id' => 23,
                'role_id' => 4,
            ),
            68 =>
            array(
                'permission_id' => 23,
                'role_id' => 6,
            ),
            69 =>
            array(
                'permission_id' => 24,
                'role_id' => 3,
            ),
            70 =>
            array(
                'permission_id' => 24,
                'role_id' => 4,
            ),
            71 =>
            array(
                'permission_id' => 24,
                'role_id' => 6,
            ),
            72 =>
            array(
                'permission_id' => 24,
                'role_id' => 7,
            ),
            73 =>
            array(
                'permission_id' => 25,
                'role_id' => 4,
            ),
            74 =>
            array(
                'permission_id' => 25,
                'role_id' => 6,
            ),
            75 =>
            array(
                'permission_id' => 26,
                'role_id' => 4,
            ),
            76 =>
            array(
                'permission_id' => 26,
                'role_id' => 6,
            ),
            77 =>
            array(
                'permission_id' => 27,
                'role_id' => 4,
            ),
            78 =>
            array(
                'permission_id' => 27,
                'role_id' => 6,
            ),
            79 =>
            array(
                'permission_id' => 28,
                'role_id' => 4,
            ),
            80 =>
            array(
                'permission_id' => 28,
                'role_id' => 6,
            ),
            81 =>
            array(
                'permission_id' => 29,
                'role_id' => 3,
            ),
            82 =>
            array(
                'permission_id' => 29,
                'role_id' => 4,
            ),
            83 =>
            array(
                'permission_id' => 29,
                'role_id' => 6,
            ),
            84 =>
            array(
                'permission_id' => 29,
                'role_id' => 7,
            ),
            85 =>
            array(
                'permission_id' => 30,
                'role_id' => 3,
            ),
            86 =>
            array(
                'permission_id' => 30,
                'role_id' => 4,
            ),
            87 =>
            array(
                'permission_id' => 30,
                'role_id' => 6,
            ),
            88 =>
            array(
                'permission_id' => 30,
                'role_id' => 7,
            ),
            89 =>
            array(
                'permission_id' => 31,
                'role_id' => 3,
            ),
            90 =>
            array(
                'permission_id' => 31,
                'role_id' => 4,
            ),
            91 =>
            array(
                'permission_id' => 31,
                'role_id' => 6,
            ),
            92 =>
            array(
                'permission_id' => 31,
                'role_id' => 7,
            ),
            93 =>
            array(
                'permission_id' => 32,
                'role_id' => 3,
            ),
            94 =>
            array(
                'permission_id' => 32,
                'role_id' => 4,
            ),
            95 =>
            array(
                'permission_id' => 32,
                'role_id' => 6,
            ),
            96 =>
            array(
                'permission_id' => 32,
                'role_id' => 7,
            ),
            97 =>
            array(
                'permission_id' => 33,
                'role_id' => 3,
            ),
            98 =>
            array(
                'permission_id' => 33,
                'role_id' => 4,
            ),
            99 =>
            array(
                'permission_id' => 33,
                'role_id' => 6,
            ),
            100 =>
            array(
                'permission_id' => 33,
                'role_id' => 7,
            ),
            101 =>
            array(
                'permission_id' => 34,
                'role_id' => 3,
            ),
            102 =>
            array(
                'permission_id' => 34,
                'role_id' => 4,
            ),
            103 =>
            array(
                'permission_id' => 34,
                'role_id' => 6,
            ),
            104 =>
            array(
                'permission_id' => 34,
                'role_id' => 7,
            ),
            105 =>
            array(
                'permission_id' => 35,
                'role_id' => 4,
            ),
            106 =>
            array(
                'permission_id' => 35,
                'role_id' => 6,
            ),
            107 =>
            array(
                'permission_id' => 36,
                'role_id' => 4,
            ),
            108 =>
            array(
                'permission_id' => 36,
                'role_id' => 6,
            ),
            109 =>
            array(
                'permission_id' => 37,
                'role_id' => 4,
            ),
            110 =>
            array(
                'permission_id' => 37,
                'role_id' => 6,
            ),
            111 =>
            array(
                'permission_id' => 38,
                'role_id' => 4,
            ),
            112 =>
            array(
                'permission_id' => 38,
                'role_id' => 6,
            ),
            113 =>
            array(
                'permission_id' => 39,
                'role_id' => 4,
            ),
            114 =>
            array(
                'permission_id' => 39,
                'role_id' => 6,
            ),
        ));
    }
}
