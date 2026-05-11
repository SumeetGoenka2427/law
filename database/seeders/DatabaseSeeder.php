<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            AuthorSeeder::class,
            TagSeeder::class,
            JudgmentSeeder::class,
            LatestNewsSeeder::class,
            ArticleSeeder::class,
            InterviewSeeder::class,
            OpinionSeeder::class,
            AdvertisementSeeder::class,
        ]);
    }
}
