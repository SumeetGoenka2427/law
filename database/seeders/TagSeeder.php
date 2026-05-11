<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Supreme Court', 'High Court', 'Bail', 'POCSO', 'IBC',
            'Electoral Bond', 'Article 370', 'NDPS Act', 'BNS', 'BNSS',
            'DPDP Act', 'Arbitration', 'Contempt', 'Habeas Corpus',
            'Anticipatory Bail', 'Section 498A', 'GST', 'NCLT',
            'CBI', 'ED', 'PMLA', 'NIA', 'Section 124A', 'CAA',
            'Right to Privacy', 'Article 21', 'Free Speech',
            'Property Rights', 'Divorce', 'Maintenance', 'Adoption',
            'Cybercrime', 'Data Protection', 'AI Regulation',
            'Forest Rights', 'NGT', 'Pollution', 'Land Acquisition',
            'Maternity Benefit', 'ESIC', 'Minimum Wages',
            'Commercial Courts', 'MSME', 'Consumer Protection',
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name'       => $tag,
                'slug'       => Str::slug($tag),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
