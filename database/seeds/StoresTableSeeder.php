<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('stores')->get()->count() == 0) {

            DB::table('stores')->insert([

                [
                    'tag' => 'gulshanTriangle',
                    'name' => 'Pizza Hut Gulshan',
                    'location' => 'Road # 140, SE(F)- 1, Bir Uttam Mir Shawkat Ali Sarak, (South Avenue), Gulshan - 1, Dhaka- 1212.',
                    'start_time' => '11:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'gulshan2Triangle',
                    'name' => 'Pizza Hut RM Center',
                    'location' => 'House- 101( 2nd Floor), Gulshan Avenue, Gulshan - 2, Dhaka-1212',
                    'start_time' => '11:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'dhanmondiTriangle',
                    'name' => 'Pizza Hut Dhanmondi',
                    'location' => 'Plot # 754, Satmasjid Road, Dhanmondi, Dhaka- 1205',
                    'start_time' => '11:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'dhanmondi2Triangle',
                    'name' => 'Pizza Hut Delivery Dhanmondi',
                    'location' => 'Dr. Refat Ullahs Happy Arcade, House-03, Road-03, Dhanmondi, Dhaka',
                    'start_time' => '10:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'bailyTriangle',
                    'name' => 'Pizza Hut Baily Road',
                    'location' => '3, New Baily Road, 10, Natok Sarani, Gold Hunt Shopping Complex, Dhaka.',
                    'start_time' => '11:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'uttaraTriangle',
                    'name' => 'Pizza Hut Uttara',
                    'location' => 'Plot # 13, Sec # 13, Sonargaon, Janapath, Uttara, Dhaka-1230',
                    'start_time' => '11:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'uttara2Triangle',
                    'name' => 'Pizza Hut Delivery Uttara',
                    'location' => 'H#06, Road#02, Ahmed Plaza (Gr. Flr), Sector-03, Uttara, Dhaka-1230',
                    'start_time' => '10:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'bhataraTriangle',
                    'name' => 'Pizza Hut Delivery Bhatara',
                    'location' => 'Adept N. R. Complex, Plot- Ka 5/2, Bashundhara Link Road, Jagannathpur, Badda, Dhaka-1229',
                    'start_time' => '10:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'bananiTriangle',
                    'name' => 'Pizza Hut Delivery Banani',
                    'location' => 'Plot- 50, Road- 11, Block- C, Banani Police Station, Banani, Dhaka-1213.',
                    'start_time' => '10:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'mirpurTriangle',
                    'name' => 'Pizza Hut Delivery Mirpur',
                    'location' => 'Spring Rahmat E Tuba, Plot-132, Road-2, Block- A, Section- 12,  Mirpur, Dhaka',
                    'start_time' => '10:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'uttara2Triangle',
                    'name' => 'Pizza Hut Delivery Sony',
                    'location' => 'Sony Cinema Bhaban, Ist Floor, Plot-1, Block-D,Sector-02, Mirpur, Dhaka-1216',
                    'start_time' => '10:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'tag' => 'wariTriangle',
                    'name' => 'Pizza Hut Delivery Wari',
                    'location' => 'A.K. Famous Tower, 41 Rankin Street, Wari, Dhaka',
                    'start_time' => '10:00:00',
                    'end_time' => '23:00:00',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);
        }
    }
}
