<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Contact;
use DateTime;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactRecord = [
            ['id' => 1,
            'email' => 'admin@gmail.com' ,
            'contact_number' => '1234567998' ,
            'other_contact_number' => '1234567899' ,
            'address' => 'Unit #215, 12992-76' ,
            'city' => 'Surrey' ,
            'state' => 'British Columbia' ,
            'country' => 'Canada' ,
            'pincode' => ' V3W 2V6' ,
            'working_days' => 'Monday-Friday' ,
            'working_time' => '9AM-5:30PM' ,
            'languages' => 'English, Punjabi, Hindi & French' ,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]
        ];

        Contact::insert($contactRecord);
    }
}
