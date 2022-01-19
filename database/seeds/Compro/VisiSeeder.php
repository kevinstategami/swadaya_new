<?php

use Illuminate\Database\Seeder;
use DB;
class Compro/VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visis')->insert([
            'content' => 'THIS IS CONTENT',
        ]);
    }
}
