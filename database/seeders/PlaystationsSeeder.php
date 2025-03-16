<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaystationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('playstations')->insert([
            ['name' => 'PlayStation 3', 'year' => '2006', 'price' => 10000],
            ['name' => 'PlayStation 4', 'year' => '2013', 'price' => 30000],
            ['name' => 'PlayStation 5', 'year' => '2020', 'price' => 40000],
        ]);
    }
}
