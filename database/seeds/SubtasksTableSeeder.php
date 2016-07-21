<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubtasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('subtasks')->truncate();

        DB::table('subtasks')->insert([
            [
                'user_id' => 1,
                'task_id' => rand(1, 3),
                'name' => 'First subtask',
                'description' => 'Subtask description.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'task_id' => rand(1, 3),
                'name' => 'Second subtask',
                'description' => 'Subtask description.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'task_id' => rand(1, 3),
                'name' => 'Third subtask',
                'description' => 'Subtask description.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'task_id' => rand(1, 3),
                'name' => 'Fourth subtask',
                'description' => 'Subtask description.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'task_id' => rand(1, 3),
                'name' => 'Fifth subtask',
                'description' => 'Subtask description.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
