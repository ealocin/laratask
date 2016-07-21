<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'Demo',
            'email' => 'demo@laratask.dev',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
