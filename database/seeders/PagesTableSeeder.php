<?php

namespace Database\Seeders;
// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Page;
use DateTime;
class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagesRecord = [
            ['id' => 1, 'name' => 'about' ,'url' => 'about' ,'content' => 'about us' , 'status' => 'Active' ,   'created_at' => new DateTime(),  'updated_at' => new DateTime(),]
        ];

        Page::insert($pagesRecord);
    }
}
