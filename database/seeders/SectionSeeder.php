<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['name' => 'General'],
            ['name' => 'Informática'],
            ['name' => 'Clases'],
        ];

        DB::table('sections')->insert($sections);
    }
}
