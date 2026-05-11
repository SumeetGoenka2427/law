<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use App\Models\Tag;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $scId   = Category::where('slug', 'supreme-court')->value('id');
        $constId = Category::where('slug', 'constitutional-law')->value('id');
        $corpId = Category::where('slug', 'corporate-law')->value('id');
        $cyberID = Category::where('slug', 'cyber-law')->value('id');
        $crId   = Category::where('slug', 'criminal-law')->value('id');
        $arbId  = Category::where('slug', 'arbitration')->value('id');

        $priya  = Author::where('slug', 'priya-menon')->value('id');
        $arjun  = Author::where('slug', 'arjun-krishnan')->value('id');
        $kiran  = Author::where('slug', 'kiran-nair')->value('id');
        $neha   = Author::where('slug', 'dr-neha-srivastava')->value('id');
        $staff  = Author::where('slug', 'staff-reporter')->value('id');

        $articles = [
            [
                'category_id'  => $crId,
                'author_id'    => $arjun,
                'title'        => 'What the New BNS Provisions Mean for Accused in Ongoing Trials: A Practical Guide',
                'excerpt'      => 'With the Bharatiya Nyaya Sanhita replacing the IPC, practitioners face urgent questions about transitional applicability, re-numbering of charges and procedural implications for pending trials.',
                'content'      => "The coming into force of the Bharatiya Nyaya Sanhita, 2023 (BNS) on July 1, 2024 has triggered a wave of procedural uncertainty in criminal courts across India. This article examines the key practical questions that defence lawyers, prosecutors and trial judges are grappling with.\n\n**I. TRANSITIONAL APPLICABILITY: WHICH LAW GOVERNS?**\n\nSection 358 of the BNSS provides that all trials pending before a court immediately before the commencement of this Code shall be continued and concluded as if this Code had not come into force. This preserves the procedural framework of the CrPC for pending trials.\n\nHowever, the substantive position is more complex. The general principle in criminal law is that the law applicable is the one in force at the time of the commission of the offence. Accordingly, a person who committed an offence in 2022 will be tried under the IPC provisions, even if the trial continues post-July 2024.\n\n**II. PRACTICAL IMPLICATIONS FOR BAIL APPLICATIONS**\n\nBail applications in pending matters should continue to cite IPC section numbers. However, when courts consult reference books or commentaries organised by BNS section numbers, the practitioner must be prepared to cross-reference the corresponding IPC provision.\n\nSeveral district courts have already issued administrative circulars requiring cause-lists to reflect both the IPC section and the corresponding BNS section for new registrations.\n\n**III. THE SECTION 152 BNS DEBATE**\n\nThe most contested provision is Section 152 BNS, which is widely perceived as the successor to the sedition provision under Section 124A IPC. The Supreme Court had put Section 124A in abeyance in May 2022 in S.G. Vombatkere vs Union of India. A batch of petitions now challenges Section 152 BNS on similar grounds. Until the Supreme Court rules, the provision remains operational.\n\n**IV. CONCLUSION**\n\nPractitioners must maintain dual familiarity with both statutes for the foreseeable future. A comprehensive comparison table of IPC-to-BNS provisions is appended to this article.",
                'status'       => 'published',
                'is_featured'  => true,
                'published_at' => now()->subDays(2),
                'meta_title'   => 'BNS Provisions for Ongoing Trials — Practical Guide',
                'meta_description' => 'A practical guide for lawyers on how the Bharatiya Nyaya Sanhita affects ongoing criminal trials, bail applications and procedural steps.',
                'tags'         => ['BNS', 'BNSS', 'Criminal Law'],
            ],
            [
                'category_id'  => $cyberID,
                'author_id'    => $neha,
                'title'        => "The DPDP Act's Consent Framework — A Comparative Study with GDPR's Legitimate Interest Doctrine",
                'excerpt'      => "The Digital Personal Data Protection Act 2023 leans heavily on consent as the primary ground for processing, yet fails to incorporate GDPR's robust \"legitimate interests\" balancing test, creating a regulatory vacuum.",
                'content'      => "The Digital Personal Data Protection Act, 2023 (DPDP Act) represents India's first standalone data protection statute. While it borrows substantially from GDPR principles, a critical divergence lies in its treatment of consent as a near-exclusive ground for data processing.\n\n**I. THE DPDP ACT'S CONSENT ARCHITECTURE**\n\nSection 6 of the DPDP Act mandates that a Data Fiduciary must obtain free, specific, informed, unconditional and unambiguous consent from the Data Principal before processing personal data. The Act recognises \"legitimate uses\" under Section 7 — which include processing for the purposes of employment, medical emergencies and legal proceedings — but these are narrowly drawn and do not approximate the breadth of GDPR's Article 6(1)(f) legitimate interests ground.\n\n**II. GDPR'S LEGITIMATE INTEREST DOCTRINE**\n\nUnder GDPR Article 6(1)(f), processing is lawful if it is necessary for the purposes of the legitimate interests pursued by the controller or a third party, except where such interests are overridden by the interests or fundamental rights of the data subject. This is operationalised through a three-part Legitimate Interests Assessment (LIA):\n\n1. Purpose test: Is the interest legitimate?\n2. Necessity test: Is processing necessary for that purpose?\n3. Balancing test: Do the data subject's rights override the controller's interest?\n\n**III. THE VACUUM IN DPDP**\n\nThe absence of a flexible legitimate interests ground creates significant operational challenges for Indian businesses. Consider the following scenarios:\n\n- Fraud prevention: A fintech company processing transaction patterns to detect fraud cannot easily fit this within the DPDP's consent or legitimate uses framework.\n- Employee monitoring: Limited coverage under the employment purpose exception creates grey areas around workplace analytics.\n- Academic research: The research exemption in Section 17 is poorly defined and likely to generate litigation.\n\n**IV. RECOMMENDATIONS**\n\nThe Data Protection Board, when constituted, should issue guidance expanding the \"legitimate uses\" categories through subordinate legislation to fill the gaps identified. India's trade relationships — particularly with the EU, which has extended adequacy discussions — will also require eventual convergence with GDPR standards.",
                'status'       => 'published',
                'is_featured'  => true,
                'published_at' => now()->subDays(3),
                'meta_title'   => 'DPDP Act vs GDPR: Consent and Legitimate Interests Compared',
                'meta_description' => 'A scholarly comparison of India\'s DPDP Act consent framework with GDPR\'s legitimate interest doctrine, identifying gaps and recommending reforms.',
                'tags'         => ['DPDP Act', 'Data Protection', 'Cyber Law'],
            ],
            [
                'category_id'  => $arbId,
                'author_id'    => $kiran,
                'title'        => 'How to Challenge an Arbitral Award Under Section 34: A Step-by-Step Guide for Practitioners',
                'excerpt'      => 'Section 34 of the Arbitration and Conciliation Act provides the only domestic route to challenge an arbitral award. This guide maps the procedure, timelines and jurisprudential developments.',
                'content'      => "Section 34 of the Arbitration and Conciliation Act, 1996 provides limited grounds on which an arbitral award may be set aside by a court. Given the legislative policy favouring minimal judicial intervention in arbitration, understanding both the scope and the procedure is critical for practitioners.\n\n**I. GROUNDS FOR CHALLENGE**\n\nSection 34(2) permits challenge on the following grounds:\n\n(a) *Party-related incapacity*: The parties to the arbitration agreement were under some incapacity.\n\n(b) *Invalid agreement*: The arbitration agreement is not valid under the applicable law.\n\n(c) *Inadequate notice*: The party making the application was not given proper notice of the appointment of the arbitrator or of the arbitral proceedings.\n\n(d) *Excess of mandate*: The award deals with a dispute not contemplated by or not falling within the terms of the submission to arbitration.\n\n(e) *Composition or procedure*: The composition of the arbitral tribunal or procedure was not in accordance with the parties' agreement.\n\n(f) *Non-arbitrability*: The subject-matter of the dispute is not capable of settlement by arbitration under Indian law.\n\n(g) *Public policy*: The award conflicts with the public policy of India — which, after the 2015 amendment, is confined to fraud, corruption and violations of the most basic notions of morality and justice.\n\n**II. THE CRITICAL TIMELINE**\n\nSection 34(3) prescribes a limitation period of three months from the date of receipt of the arbitral award. The court has power to condone delay of a further 30 days on sufficient cause — but not beyond. The Supreme Court in Government of Maharashtra vs M/s. Borse Brothers Engineers (2021) confirmed this outer limit is absolute.\n\n**III. THE PATIL TRIBUNAL PROCEDURE**\n\nApplications under Section 34 are filed before the Principal Civil Court of original jurisdiction at the seat of arbitration (or the High Court if designated). The application must be accompanied by the original award or a certified copy.\n\n**IV. RECENT JURISPRUDENTIAL DEVELOPMENTS**\n\nThe Supreme Court in NTPC vs SPML Infra (2023) reiterated the \"minimal curial intervention\" principle, holding that courts must resist the temptation to re-examine the merits of the dispute under the guise of public policy review.",
                'status'       => 'published',
                'is_featured'  => false,
                'published_at' => now()->subDays(4),
                'meta_title'   => 'Challenging Arbitral Awards Under Section 34 — Practitioner\'s Guide',
                'meta_description' => 'Step-by-step guide on challenging arbitral awards under Section 34 of the Arbitration Act, covering grounds, timelines and Supreme Court jurisprudence.',
                'tags'         => ['Arbitration', 'Supreme Court'],
            ],
            [
                'category_id'  => $constId,
                'author_id'    => $priya,
                'title'        => 'Five-Judge Bench Reserves Order on Centre\'s Power to Alter State Boundaries Without Consent',
                'excerpt'      => 'In a significant constitutional moment, a five-judge bench presided over by CJI Chandrachud heard exhaustive arguments on whether Parliament can unilaterally bifurcate a state without the state legislature\'s concurrence.',
                'content'      => "A five-judge Constitution Bench of the Supreme Court of India has reserved its judgment on the question of whether Parliament has the power to alter state boundaries, bifurcate states or create new union territories without the consent of the concerned state legislature under Article 3 of the Constitution.\n\n**BACKGROUND**\n\nThe Constitution Bench was constituted in the backdrop of challenges to the reorganisation of the erstwhile state of Jammu & Kashmir into two union territories by the Jammu and Kashmir Reorganisation Act, 2019. Similar questions arise from the Andhra Pradesh reorganisation that created Telangana in 2014.\n\n**THE CENTRAL CONSTITUTIONAL QUESTION**\n\nArticle 3 of the Constitution empowers Parliament to form new states by separation of territory from any state, increase the area of any state and diminish the area of any state. However, the Article also provides that a Bill to do so must be referred to the legislature of the affected state for expressing its views — though Parliament is not bound by those views.\n\nThe key question before the Bench was: does this procedure, which allows Parliament to override a state legislature's objection, violate the basic structure of the Constitution insofar as it affects the federal character of the Indian polity?\n\n**ARGUMENTS**\n\nThe Solicitor General argued that Article 3 is an express constitutional provision conferring plenary power on Parliament and cannot be said to violate a basic structure that the Constitution itself has created.\n\nSenior advocates for the petitioners contended that while Parliament has the power to reorganise states, it cannot do so by completely extinguishing the statehood of a unit — converting it into a Union Territory removes it from the federal compact entirely.\n\n**SIGNIFICANCE**\n\nThe judgment, when delivered, will have profound implications for federal governance in India and may set limits on Parliament's reorganisation powers for the first time.",
                'status'       => 'published',
                'is_featured'  => true,
                'published_at' => now()->subDays(1),
                'meta_title'   => 'SC Constitution Bench: Centre\'s Power to Alter State Boundaries',
                'meta_description' => 'Analysis of the five-judge Supreme Court Constitution Bench hearing on Parliament\'s power to alter state boundaries under Article 3 without state consent.',
                'tags'         => ['Supreme Court', 'Constitutional Law'],
            ],
            [
                'category_id'  => $corpId,
                'author_id'    => $kiran,
                'title'        => 'Gujarat HC: NRI Property Dispute Must Be Adjudicated in India If Property Is Situated Here',
                'excerpt'      => 'The Gujarat High Court dismissed a jurisdictional challenge by an NRI defendant, holding that property situated in India cannot be made the subject of proceedings in a foreign court.',
                'content'      => "The Gujarat High Court has held that a civil dispute relating to immovable property situated in India must be adjudicated by Indian courts, regardless of where the parties are domiciled, and a foreign court judgment on such a dispute would not bind an Indian court.\n\nJustice Sangeeta Vishen, dismissing an application filed by an NRI defendant seeking stay of proceedings on the basis of a parallel suit filed in the United States, held:\n\n\"Section 16 of the Civil Procedure Code, 1908 is explicit that a suit for recovery of immovable property situate in India shall be instituted in the court within the local limits of whose jurisdiction the property is situate. This is a rule of mandatory jurisdiction that cannot be ousted by party agreement or the comity of courts.\"\n\nThe court further held that a judgment of a US court on title to property in India would not be a 'foreign judgment' entitled to recognition under Section 13 CPC, since the US court would itself lack jurisdiction under Indian law.\n\n**PRACTICAL IMPACT**\n\nThe ruling has significant implications for the growing number of NRI property disputes where one party attempts to litigate in a more favourable foreign jurisdiction. Indian courts have consistently held that suits relating to Indian land must be tried in India.",
                'status'       => 'published',
                'is_featured'  => false,
                'published_at' => now()->subDays(5),
                'meta_title'   => 'NRI Property Disputes Must Be Filed in India — Gujarat HC',
                'meta_description' => 'Gujarat High Court ruling on jurisdiction of Indian courts over NRI property disputes under Section 16 CPC, and implications for foreign court judgments.',
                'tags'         => ['High Courts', 'Property Rights'],
            ],
            [
                'category_id'  => $scId,
                'author_id'    => $staff,
                'title'        => 'SC Collegium Recommends 17 Additional Judges for Elevation to High Courts; Full List Published',
                'excerpt'      => 'The Supreme Court Collegium has recommended 17 names for appointment as Additional Judges to various High Courts, with six recommendations for the Delhi High Court alone.',
                'content'      => "The Supreme Court Collegium, in its meeting held on May 8, 2026, resolved to recommend 17 names for appointment as Additional Judges to various High Courts across the country. The recommendations have been forwarded to the Union Ministry of Law and Justice.\n\n**KEY RECOMMENDATIONS**\n\nDelhi High Court (6 recommendations):\n- Adv. Rajan Mehta — Standing counsel, Delhi High Court for 18 years\n- Adv. Sunita Chakraborty — Practitioner specialising in constitutional and election law\n\nBombay High Court (4 recommendations):\n- Adv. Vikram Sawant — Corporate and insolvency law practitioner\n- Adv. Meghna Kulkarni — Criminal law and human rights\n\nMadras High Court (3 recommendations):\n- Adv. P. Arulmurugan — Retired District Judge recommended for elevation\n\nCalcutta High Court (2 recommendations):\n- Adv. Debashis Banerjee — Constitutional law specialist\n\nKerala High Court (2 recommendations):\n- Adv. Lakshmi Nair — Labour and service law\n\n**COLLEGIUM PROCESS**\n\nThe recommendations were made after consultation with the Chief Justices of the respective High Courts and the senior-most judges of the Supreme Court familiar with the respective High Courts. The Union Government is expected to process the recommendations within the stipulated 30-day period.",
                'status'       => 'published',
                'is_featured'  => false,
                'published_at' => now()->subDays(2)->subHours(6),
                'meta_title'   => 'SC Collegium Recommends 17 High Court Judges — Full List',
                'meta_description' => 'Supreme Court Collegium recommends 17 names for Additional Judge positions across Delhi, Bombay, Madras, Calcutta and Kerala High Courts.',
                'tags'         => ['Supreme Court', 'High Courts'],
            ],
        ];

        foreach ($articles as $data) {
            $tags = $data['tags'] ?? [];
            unset($data['tags']);

            $article = Article::create($data);

            if (!empty($tags)) {
                $tagIds = Tag::whereIn('name', $tags)->pluck('id');
                $article->tags()->sync($tagIds);
            }
        }
    }
}
