<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Supreme Court',     'color' => '#8B0000'],
            ['name' => 'High Courts',        'color' => '#1a1a2e'],
            ['name' => 'Criminal Law',       'color' => '#2c3e50'],
            ['name' => 'Constitutional Law', 'color' => '#c0392b'],
            ['name' => 'Corporate Law',      'color' => '#2980b9'],
            ['name' => 'Family Law',         'color' => '#8e44ad'],
            ['name' => 'Cyber Law',          'color' => '#16a085'],
            ['name' => 'Environmental Law',  'color' => '#27ae60'],
            ['name' => 'Labour Law',         'color' => '#e67e22'],
            ['name' => 'Arbitration',        'color' => '#34495e'],
            ['name' => 'Tribunals',          'color' => '#7f8c8d'],
            ['name' => 'Legislation',        'color' => '#c9a84c'],
        ];

        foreach ($categories as $cat) {
            DB::table('categories')->insert([
                'name'        => $cat['name'],
                'slug'        => Str::slug($cat['name']),
                'description' => 'Coverage of ' . $cat['name'] . ' matters in India.',
                'color'       => $cat['color'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
