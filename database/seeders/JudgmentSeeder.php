<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Judgment;
use App\Models\Category;

class JudgmentSeeder extends Seeder
{
    public function run(): void
    {
        $scId  = Category::where('slug', 'supreme-court')->value('id');
        $hcId  = Category::where('slug', 'high-courts')->value('id');
        $crId  = Category::where('slug', 'criminal-law')->value('id');
        $corpId = Category::where('slug', 'corporate-law')->value('id');
        $envId = Category::where('slug', 'environmental-law')->value('id');

        $judgments = [
            [
                'category_id' => $scId,
                'title'       => 'Vikram Enterprises vs Union of India & Ors. — GST Pre-Deposit Upheld',
                'case_number' => 'Civil Appeal No. 4512/2026',
                'court'       => 'Supreme Court of India',
                'bench'       => 'Justices Oka & Agarwal',
                'excerpt'     => 'Mandatory pre-deposit under GST Act before filing appeal does not violate Article 14 or Article 19(1)(g). Doctrine of legitimate expectation does not apply to tax statutes prospectively amended by Parliament.',
                'content'     => "JUDGMENT\n\nThe Supreme Court of India, in Civil Appeal No. 4512/2026, upheld the constitutional validity of the mandatory pre-deposit requirement under Section 107(6) of the Central Goods and Services Tax Act, 2017.\n\nFACTS:\nThe appellant, Vikram Enterprises, challenged the requirement to deposit 10% of the disputed tax amount as a precondition for filing an appeal before the GST Appellate Authority. The appellant contended this violated Articles 14 and 19(1)(g) of the Constitution and frustrated the doctrine of legitimate expectation.\n\nHELD:\n1. The mandatory pre-deposit is a regulatory measure to deter frivolous appeals and ensure revenue protection — it does not amount to a disproportionate restriction on the right to trade.\n\n2. The doctrine of legitimate expectation cannot be invoked against a statutory provision that has been prospectively amended by Parliament in exercise of its plenary legislative power.\n\n3. Article 14 is not violated as the classification between pre-GST and post-GST taxpayers is based on intelligible differentia with a rational nexus to the object of the GST legislation.\n\nThe appeal is accordingly dismissed. No order as to costs.",
                'decided_at'  => '2026-04-17',
                'status'      => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(1),
            ],
            [
                'category_id' => $hcId,
                'title'       => 'Priya Sharma vs State of Delhi — Custodial Harassment: ₹5 Lakh Compensation Ordered',
                'case_number' => 'W.P.(C) 8821/2025',
                'court'       => 'Delhi High Court',
                'bench'       => 'Justice Rekha Palli',
                'excerpt'     => 'Delhi HC directed Delhi Police to pay ₹5 lakh compensation to victim of custodial harassment, invoking constitutional tort doctrine and holding the State vicariously liable for fundamental rights violations.',
                'content'     => "JUDGMENT\n\nW.P.(C) 8821/2025 — Priya Sharma vs State of Delhi & Anr.\n\nThis writ petition was filed under Article 226 of the Constitution of India seeking compensation for unlawful detention and custodial harassment suffered by the petitioner at the hands of Delhi Police personnel.\n\nFACTS:\nThe petitioner was detained without due process for a period of 36 hours in October 2025. During this period, she was denied legal representation, subjected to verbal intimidation and denied basic sanitation facilities. No FIR was registered and she was released without charge.\n\nHELD:\n1. The detention was patently illegal, violating Article 21 and Article 22 of the Constitution. The police personnel acted without any legal authority.\n\n2. The constitutional tort doctrine, as expounded by the Supreme Court in Nilabati Behera vs State of Orissa (1993) 2 SCC 746, squarely applies. The State of Delhi is vicariously liable for the acts of its police personnel.\n\n3. Compensation of ₹5,00,000 (Rupees Five Lakhs) is awarded to the petitioner, to be paid within four weeks.\n\n4. The Commissioner of Police, Delhi, is directed to initiate departmental proceedings against the errant officers within two months and submit a compliance report.",
                'decided_at'  => '2026-04-16',
                'status'      => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'category_id' => $envId,
                'title'       => 'Green Advocates Forum vs MoEFCC — ₹50 Crore Environmental Penalty on Aravalli Developer',
                'case_number' => 'O.A. No. 217/2026',
                'court'       => 'National Green Tribunal — Principal Bench',
                'bench'       => 'Chairperson Justice AK Goel',
                'excerpt'     => 'NGT imposed ₹50 crore environmental compensation on a private conglomerate for illegally diverting forest land in Aravalli without prior approval under the Forest Conservation Act, 1980.',
                'content'     => "ORDER\n\nO.A. No. 217/2026 — Green Advocates Forum vs Ministry of Environment, Forest and Climate Change & Ors.\n\nThis original application has been filed challenging the illegal diversion of 87 hectares of notified forest land in the Aravalli hills of Haryana by the respondent conglomerate.\n\nFACTS:\nThe applicant, an NGO, brought to the Tribunal's notice satellite imagery and ground-truth reports evidencing large-scale land clearing, construction of approach roads and excavation within protected forest areas, without any prior approval under Section 2 of the Forest Conservation Act, 1980 or consent under the Environment Protection Act, 1986.\n\nFINDINGS:\n1. The respondent conglomerate had commenced construction activities within the notified forest area without obtaining Stage-I or Stage-II forest clearance, in clear violation of the Forest Conservation Act.\n\n2. The Haryana State Forest Department's failure to act on complaints constitutes regulatory failure.\n\nORDER:\n1. Environmental compensation of ₹50,00,00,000 (Rupees Fifty Crore) is imposed on the respondent conglomerate.\n2. A site restoration plan must be submitted within 90 days.\n3. The District Collector is directed to ensure no further construction until clearances are obtained.",
                'decided_at'  => '2026-04-15',
                'status'      => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(3),
            ],
            [
                'category_id' => $corpId,
                'title'       => 'Hindustan Unilever Ltd. vs CCI — Vertical Agreements and Dawn Raid Powers Upheld',
                'case_number' => 'Writ Petition 1204/2025',
                'court'       => 'Bombay High Court',
                'bench'       => 'Division Bench',
                'excerpt'     => 'Bombay HC upheld CCI\'s jurisdiction to investigate anti-competitive pricing in FMCG distribution chains. Dismissed challenge to dawn raid, holding CCI\'s investigative powers are quasi-administrative at investigation stage.',
                'content'     => "JUDGMENT\n\nWrit Petition No. 1204/2025 — Hindustan Unilever Ltd. vs Competition Commission of India\n\nThis writ petition was filed challenging the Competition Commission of India's jurisdiction to investigate alleged anti-competitive practices in the petitioner's distribution network and the legality of a dawn raid conducted at HUL's corporate headquarters.\n\nHELD:\n1. CCI has jurisdiction to investigate vertical agreements, including resale price maintenance and exclusive distribution arrangements, under Section 3(4) of the Competition Act, 2002.\n\n2. The investigation stage is quasi-administrative in nature and does not attract the full panoply of natural justice. The petitioner's challenge to the dawn raid on grounds of procedural fairness is premature.\n\n3. The Director General's powers under Section 41 of the Competition Act are inquisitorial and the petitioner cannot resist a search and seizure conducted with proper authorisation.\n\nThe writ petition is dismissed. Liberty to challenge any order passed by CCI at the conclusion of proceedings.",
                'decided_at'  => '2026-04-14',
                'status'      => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(4),
            ],
            [
                'category_id' => $scId,
                'title'       => 'In Re: Right to Privacy in Digital Surveillance — SC Issues Guidelines for State Interception',
                'case_number' => 'Writ Petition (Civil) 44/2024',
                'court'       => 'Supreme Court of India',
                'bench'       => 'Five-Judge Constitution Bench',
                'excerpt'     => 'Five-judge Constitution Bench of the Supreme Court issued comprehensive guidelines regulating state surveillance and phone tapping, holding that blanket interception orders without judicial oversight violate the right to privacy under Article 21.',
                'content'     => "JUDGMENT\n\nWrit Petition (Civil) No. 44/2024 — In Re: Right to Privacy in Digital Surveillance\n\nA five-judge Constitution Bench was constituted to examine the constitutional validity of the Indian Telegraph Act's interception provisions in light of the right to privacy recognised in Justice K.S. Puttaswamy (Retd.) vs Union of India (2017) 10 SCC 1.\n\nHELD:\n1. The right to privacy is a fundamental right under Article 21 and encompasses the right to be free from arbitrary electronic surveillance by the State.\n\n2. Interception orders under Section 5(2) of the Indian Telegraph Act must satisfy the three-pronged test of legality, necessity and proportionality.\n\n3. A Judicial Oversight Committee comprising retired High Court Judges must review all interception orders within 30 days of issuance. Any order found disproportionate must be immediately revoked.\n\n4. The affected persons must be notified within three months of the closure of surveillance, except where national security considerations certifiably warrant continued confidentiality — a determination that must itself be subject to sealed-cover judicial scrutiny.\n\nGuidelines issued accordingly. Union of India to file compliance report within six months.",
                'decided_at'  => '2026-05-01',
                'status'      => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'category_id' => $crId,
                'title'       => 'Madras HC: Confession Before Police Officer Inadmissible — Section 25 Evidence Act an Absolute Bar',
                'case_number' => 'Crl. A. No. 302/2025',
                'court'       => 'Madras High Court',
                'bench'       => 'Justice Murali Shankar',
                'excerpt'     => 'Confession recorded by or before a police officer carries no evidentiary value under Section 25 of the Indian Evidence Act, even if made spontaneously. The bar is absolute.',
                'content'     => "JUDGMENT\n\nCriminal Appeal No. 302/2025\n\nThis criminal appeal challenges a conviction under Sections 302 and 392 IPC, where the trial court relied substantially on a confession allegedly made spontaneously by the accused before a police officer.\n\nHELD:\n1. Section 25 of the Indian Evidence Act, 1872 creates an absolute and unconditional bar on the admissibility of any confession made to a police officer.\n\n2. The character of the confession — whether voluntary, spontaneous, or induced — is irrelevant once it is established that it was made to or in the presence of a police officer.\n\n3. Citing a long line of apex court precedents including Dagdu vs State of Maharashtra (1977) and Bharat vs State of Uttar Pradesh (2023), this court holds that the trial court erred in placing reliance on the alleged confession.\n\n4. The remaining evidence — a single eyewitness of doubtful credibility — is insufficient to sustain conviction. The conviction is set aside and the appellant is acquitted.",
                'decided_at'  => '2026-04-10',
                'status'      => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(6),
            ],
        ];

        foreach ($judgments as $j) {
            Judgment::create($j);
        }
    }
}
