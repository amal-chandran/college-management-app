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
                'name' => 'menu-attendances',
                'created_at' => '2019-11-14 23:27:41',
                'updated_at' => '2019-11-14 23:30:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menu-slots',
                'created_at' => '2019-11-14 23:27:57',
                'updated_at' => '2019-11-14 23:27:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'menu-subjects',
                'created_at' => '2019-11-14 23:28:12',
                'updated_at' => '2019-11-14 23:28:12',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'menu-student-class',
                'created_at' => '2019-11-14 23:28:29',
                'updated_at' => '2019-11-14 23:28:29',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'menu-users',
                'created_at' => '2019-11-14 23:28:41',
                'updated_at' => '2019-11-14 23:28:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'menu-roles',
                'created_at' => '2019-11-14 23:28:56',
                'updated_at' => '2019-11-14 23:28:56',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'menu-permissions',
                'created_at' => '2019-11-14 23:29:55',
                'updated_at' => '2019-11-14 23:29:55',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'menu-dashboard',
                'created_at' => '2019-11-15 00:24:13',
                'updated_at' => '2019-11-15 00:24:13',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'create-users',
                'created_at' => '2019-11-15 00:42:26',
                'updated_at' => '2019-11-15 00:42:26',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'edit-users',
                'created_at' => '2019-11-15 00:42:26',
                'updated_at' => '2019-11-15 00:42:26',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'update-users',
                'created_at' => '2019-11-15 00:42:26',
                'updated_at' => '2019-11-15 00:42:26',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'delete-users',
                'created_at' => '2019-11-15 00:42:27',
                'updated_at' => '2019-11-15 00:42:27',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'view-users',
                'created_at' => '2019-11-15 00:44:44',
                'updated_at' => '2019-11-15 00:44:44',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'view-attendance',
                'created_at' => '2019-11-15 00:45:47',
                'updated_at' => '2019-11-15 00:45:47',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'create-attendance',
                'created_at' => '2019-11-15 00:45:47',
                'updated_at' => '2019-11-15 00:45:47',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'edit-attendance',
                'created_at' => '2019-11-15 00:45:47',
                'updated_at' => '2019-11-15 00:45:47',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'update-attendance',
                'created_at' => '2019-11-15 00:45:47',
                'updated_at' => '2019-11-15 00:45:47',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'delete-attendance',
                'created_at' => '2019-11-15 00:46:01',
                'updated_at' => '2019-11-15 00:46:01',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'view-student-class',
                'created_at' => '2019-11-15 00:47:15',
                'updated_at' => '2019-11-15 00:47:15',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'create-student-class',
                'created_at' => '2019-11-15 00:47:15',
                'updated_at' => '2019-11-15 00:47:15',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'edit-student-class',
                'created_at' => '2019-11-15 00:47:15',
                'updated_at' => '2019-11-15 00:47:15',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'update-student-class',
                'created_at' => '2019-11-15 00:47:15',
                'updated_at' => '2019-11-15 00:47:15',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'delete-student-class',
                'created_at' => '2019-11-15 00:47:15',
                'updated_at' => '2019-11-15 00:47:15',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'view-slots',
                'created_at' => '2019-11-15 00:48:35',
                'updated_at' => '2019-11-15 00:48:35',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'create-slots',
                'created_at' => '2019-11-15 00:48:35',
                'updated_at' => '2019-11-15 00:48:35',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'edit-slots',
                'created_at' => '2019-11-15 00:48:35',
                'updated_at' => '2019-11-15 00:48:35',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'update-slots',
                'created_at' => '2019-11-15 00:48:35',
                'updated_at' => '2019-11-15 00:48:35',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'delete-slots',
                'created_at' => '2019-11-15 00:48:35',
                'updated_at' => '2019-11-15 00:48:35',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'view-attendees',
                'created_at' => '2019-11-15 00:49:45',
                'updated_at' => '2019-11-15 00:49:45',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'create-attendees',
                'created_at' => '2019-11-15 00:49:45',
                'updated_at' => '2019-11-15 00:49:45',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'edit-attendees',
                'created_at' => '2019-11-15 00:49:45',
                'updated_at' => '2019-11-15 00:49:45',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'update-attendees',
                'created_at' => '2019-11-15 00:49:45',
                'updated_at' => '2019-11-15 00:49:45',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'delete-attendees',
                'created_at' => '2019-11-15 00:49:45',
                'updated_at' => '2019-11-15 00:49:45',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'view-subjects',
                'created_at' => '2019-11-15 00:50:30',
                'updated_at' => '2019-11-15 00:50:30',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'create-subjects',
                'created_at' => '2019-11-15 00:50:30',
                'updated_at' => '2019-11-15 00:50:30',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'edit-subjects',
                'created_at' => '2019-11-15 00:50:30',
                'updated_at' => '2019-11-15 00:50:30',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'update-subjects',
                'created_at' => '2019-11-15 00:50:30',
                'updated_at' => '2019-11-15 00:50:30',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'delete-subjects',
                'created_at' => '2019-11-15 00:50:30',
                'updated_at' => '2019-11-15 00:50:30',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'manage-students-student-class',
                'created_at' => '2019-11-15 09:40:55',
                'updated_at' => '2019-11-15 09:40:55',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'view-permissions',
                'created_at' => '2019-11-24 18:19:00',
                'updated_at' => '2019-11-24 18:19:00',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'create-permissions',
                'created_at' => '2019-11-24 18:19:00',
                'updated_at' => '2019-11-24 18:19:00',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'edit-permissions',
                'created_at' => '2019-11-24 18:19:00',
                'updated_at' => '2019-11-24 18:19:00',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'update-permissions',
                'created_at' => '2019-11-24 18:19:00',
                'updated_at' => '2019-11-24 18:19:00',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'delete-permissions',
                'created_at' => '2019-11-24 18:19:00',
                'updated_at' => '2019-11-24 18:19:00',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'view-roles',
                'created_at' => '2019-11-24 18:19:07',
                'updated_at' => '2019-11-24 18:19:07',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'create-roles',
                'created_at' => '2019-11-24 18:19:07',
                'updated_at' => '2019-11-24 18:19:07',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'edit-roles',
                'created_at' => '2019-11-24 18:19:07',
                'updated_at' => '2019-11-24 18:19:07',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'update-roles',
                'created_at' => '2019-11-24 18:19:07',
                'updated_at' => '2019-11-24 18:19:07',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'delete-roles',
                'created_at' => '2019-11-24 18:19:07',
                'updated_at' => '2019-11-24 18:19:07',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'student-class-day-report',
                'created_at' => '2019-11-25 19:28:59',
                'updated_at' => '2019-11-25 19:28:59',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'student-class-full-report',
                'created_at' => '2019-11-25 19:29:10',
                'updated_at' => '2019-11-25 19:29:10',
            ),
        ));
        
        
    }
}