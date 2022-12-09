<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contactlist;
use DateTime;
class ContactListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactlistRecords = [

            ['id' => 1,
            'user_name' => 'User' ,
            'user_email' => 'user@gmail.com' ,
            'user_phone' => '1234567899' ,
            'user_subject' => 'my subject' ,
            'user_message' => 'my message' ,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]

        ];
        Contactlist::insert($contactlistRecords);
    }
}
