<?php

use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123'),
            'username' => 'admin',
            'status_aktivasi' => 1,
            'type' => 'ADMIN',
        ]);

        DB::table('users')->insert([
            'name' => 'OP CMS',
            'email' => 'opcms@admin.com',
            'password' => bcrypt('123123'),
            'username' => 'opcms',
            'status_aktivasi' => 1,
            'type' => 'CMS',
        ]);
    }
}
