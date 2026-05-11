<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'name'        => 'Priya Menon',
                'designation' => 'Senior Legal Correspondent',
                'bio'         => 'Priya Menon has over 12 years of experience covering the Supreme Court and constitutional matters. She is a graduate of NLU Bangalore and has previously worked with The Hindu and LiveLaw.',
                'email'       => 'priya.menon@testlaw.in',
                'twitter'     => '@priyamenon_law',
            ],
            [
                'name'        => 'Arjun Krishnan',
                'designation' => 'Criminal Law Reporter',
                'bio'         => 'Arjun Krishnan specialises in criminal law and trial court reporting. He has a law degree from Government Law College, Mumbai and has been covering courts for over 8 years.',
                'email'       => 'arjun.krishnan@testlaw.in',
                'twitter'     => '@arjunkrishnan_',
            ],
            [
                'name'        => 'Kiran Nair',
                'designation' => 'Corporate & Insolvency Desk',
                'bio'         => 'Kiran Nair tracks corporate litigation, NCLT proceedings and insolvency resolutions. An NLSIU graduate with an LLM from King\'s College London.',
                'email'       => 'kiran.nair@testlaw.in',
                'twitter'     => '@kirannair_corp',
            ],
            [
                'name'        => 'Dr. Neha Srivastava',
                'designation' => 'Professor of Law, NLU Delhi',
                'bio'         => 'Dr. Neha Srivastava is a faculty member at NLU Delhi specialising in data protection law and technology regulation. She advises multiple Parliamentary committees on digital legislation.',
                'email'       => 'neha.srivastava@testlaw.in',
                'twitter'     => '@drnehasriv',
            ],
            [
                'name'        => 'Senior Advocate Ramesh Krishnamurthy',
                'designation' => 'Senior Advocate, Supreme Court of India',
                'bio'         => 'Ramesh Krishnamurthy has practised at the Supreme Court for over 30 years, specialising in arbitration, commercial disputes and constitutional law.',
                'email'       => 'ramesh.k@testlaw.in',
                'twitter'     => '@rameshk_scbar',
            ],
            [
                'name'        => 'Staff Reporter',
                'designation' => 'TestLaw News Desk',
                'bio'         => 'TestLaw\'s in-house news team covering courts, legislation and legal developments across India.',
                'email'       => 'desk@testlaw.in',
                'twitter'     => '@testlaw_in',
            ],
            [
                'name'        => 'Adv. Siddharth Balachandran',
                'designation' => 'Constitutional Law Practitioner, Madras Bar',
                'bio'         => 'Siddharth Balachandran is a constitutional law practitioner based in Chennai with over 15 years at the Madras High Court. He writes on judicial accountability and separation of powers.',
                'email'       => 'siddharth.b@testlaw.in',
                'twitter'     => '@sidbalachandran',
            ],
        ];

        foreach ($authors as $author) {
            DB::table('authors')->insert([
                'name'        => $author['name'],
                'slug'        => Str::slug($author['name']),
                'designation' => $author['designation'],
                'bio'         => $author['bio'],
                'email'       => $author['email'],
                'twitter'     => $author['twitter'],
                'is_active'   => true,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
