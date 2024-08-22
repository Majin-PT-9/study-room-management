<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        $grades = [
            ['name' => '1', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '2', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '3', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '4', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '5', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '6', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '7', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '8', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '9', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '10', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '11', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => '12', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
        ];

        DB::table('grades')->insert($grades);
    }
}
