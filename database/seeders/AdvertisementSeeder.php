<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisementSeeder extends Seeder
{
    public function run(): void
    {
        $ads = [
            [
                'title'     => 'Leaderboard — Top Banner',
                'position'  => 'leaderboard',
                'image'     => null,
                'url'       => '#',
                'code'      => '<div style="background:#e9ecef;height:90px;display:flex;align-items:center;justify-content:center;font-size:14px;color:#6c757d;border:1px dashed #adb5bd;">Advertisement — 728×90</div>',
                'size'      => '728x90',
                'is_active' => true,
                'starts_at' => now()->subDay(),
                'ends_at'   => now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'     => 'Sidebar Top',
                'position'  => 'sidebar-top',
                'image'     => null,
                'url'       => '#',
                'code'      => '<div style="background:#e9ecef;height:250px;display:flex;align-items:center;justify-content:center;font-size:14px;color:#6c757d;border:1px dashed #adb5bd;">Advertisement — 300×250</div>',
                'size'      => '300x250',
                'is_active' => true,
                'starts_at' => now()->subDay(),
                'ends_at'   => now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'     => 'Sidebar Mid',
                'position'  => 'sidebar-mid',
                'image'     => null,
                'url'       => '#',
                'code'      => '<div style="background:#e9ecef;height:600px;display:flex;align-items:center;justify-content:center;font-size:14px;color:#6c757d;border:1px dashed #adb5bd;">Advertisement — 300×600</div>',
                'size'      => '300x600',
                'is_active' => true,
                'starts_at' => now()->subDay(),
                'ends_at'   => now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'     => 'In-Article Banner',
                'position'  => 'in-article',
                'image'     => null,
                'url'       => '#',
                'code'      => '<div style="background:#e9ecef;height:90px;display:flex;align-items:center;justify-content:center;font-size:14px;color:#6c757d;border:1px dashed #adb5bd;">Advertisement — 728×90</div>',
                'size'      => '728x90',
                'is_active' => true,
                'starts_at' => now()->subDay(),
                'ends_at'   => now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('advertisements')->insert($ads);
    }
}
