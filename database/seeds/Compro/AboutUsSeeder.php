<?php

use Illuminate\Database\Seeder;
use DB;
class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            'content' => 'THIS IS CONTENT',
        ]);
    }
}
