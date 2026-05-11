<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LatestNews;
use App\Models\Category;
use App\Models\Author;

class LatestNewsSeeder extends Seeder
{
    public function run(): void
    {
        $scId   = Category::where('slug', 'supreme-court')->value('id');
        $hcId   = Category::where('slug', 'high-courts')->value('id');
        $crId   = Category::where('slug', 'criminal-law')->value('id');
        $corpId = Category::where('slug', 'corporate-law')->value('id');
        $cyberID = Category::where('slug', 'cyber-law')->value('id');
        $famId  = Category::where('slug', 'family-law')->value('id');
        $legId  = Category::where('slug', 'legislation')->value('id');

        $priya  = Author::where('slug', 'priya-menon')->value('id');
        $arjun  = Author::where('slug', 'arjun-krishnan')->value('id');
        $kiran  = Author::where('slug', 'kiran-nair')->value('id');
        $staff  = Author::where('slug', 'staff-reporter')->value('id');

        $items = [
            [
                'category_id'  => $scId,
                'author_id'    => $staff,
                'title'        => 'SC Stays Calcutta HC Order Granting Anticipatory Bail to Former Bengal Minister in Coal Scam',
                'excerpt'      => 'The Supreme Court bench expressed strong concern over the manner in which the HC granted relief, noting that the order was "cryptic and non-reasoned."',
                'content'      => "The Supreme Court of India today stayed an order of the Calcutta High Court that had granted anticipatory bail to a former Bengal cabinet minister accused in the alleged coal scam that is being probed by the Central Bureau of Investigation.\n\nA bench comprising Justices Sanjiv Khanna and Dipankar Datta, while issuing notice to the respondent, observed orally that the High Court order was \"cryptic and non-reasoned\" and failed to discuss any of the relevant factors that must be weighed before granting anticipatory bail in a case involving economic offences.\n\n\"This is a serious economic offence. The High Court cannot grant anticipatory bail in three lines without even discussing the nature and gravity of the allegations,\" the bench observed.\n\nThe CBI had challenged the Calcutta HC order on the ground that the High Court completely ignored the chargesheet material and the gravity of the alleged offence, which involves diversion of coal worth several hundred crore rupees.\n\nThe matter will be heard in detail on the next date.",
                'status'       => 'published',
                'is_featured'  => true,
                'is_breaking'  => true,
                'published_at' => now()->subHours(2),
            ],
            [
                'category_id'  => $hcId,
                'author_id'    => $priya,
                'title'        => 'Bombay HC: Employer Cannot Terminate Employee on Basis of Medical Leave Alone — Disability Rights',
                'excerpt'      => 'Invoking Article 21 and the Rights of Persons with Disabilities Act, the division bench held that termination triggered solely by prolonged medical leave amounts to discrimination.',
                'content'      => "The Bombay High Court has held that an employer cannot terminate the services of an employee solely on the ground that the employee availed prolonged medical leave, observing that such termination violates the Rights of Persons with Disabilities Act, 2016 and Article 21 of the Constitution.\n\nA division bench of Justices Sandeep Marne and Rajesh Patil, while allowing the petition of a former employee of a pharmaceutical company, held:\n\n\"An employer has a duty to make reasonable accommodation for an employee suffering from a medical condition. Termination on the sole ground of prolonged medical leave, without considering the possibility of reassignment or modified duties, is discriminatory and illegal.\"\n\nThe court directed reinstatement of the employee with full back wages from the date of termination. It also imposed costs of ₹50,000 on the employer company, to be paid within four weeks.\n\nThe case arose from the termination of a sales manager who had been on continuous medical leave for eight months following a heart surgery. The company terminated him invoking a clause in the employment contract permitting termination after six months of continuous absence.",
                'status'       => 'published',
                'is_featured'  => true,
                'is_breaking'  => false,
                'published_at' => now()->subHours(4),
            ],
            [
                'category_id'  => $corpId,
                'author_id'    => $kiran,
                'title'        => 'NCLT Approves Insolvency Resolution Plan for Reliance Capital; CoC Votes 94% in Favour of Hinduja Bid',
                'excerpt'      => 'The National Company Law Tribunal\'s Mumbai bench approved the ₹9,650 crore resolution plan submitted by Hinduja Group in a marathon hearing spanning two days.',
                'content'      => "The Mumbai bench of the National Company Law Tribunal has approved the ₹9,650 crore resolution plan submitted by Hinduja Group for the acquisition of debt-laden Reliance Capital Ltd., one of the largest financial services insolvencies under the Insolvency and Bankruptcy Code.\n\nThe Committee of Creditors had voted 94.26% in favour of the Hinduja plan after it was upwardly revised from ₹8,110 crore to ₹9,650 crore following multiple rounds of negotiations facilitated by the NCLT.\n\nThe NCLT bench of Judicial Member Reeta Kohli and Technical Member B. Nageswar Rao, in its order, noted:\n\n\"The resolution plan meets the requirements of Section 30(2) of the IBC. The plan provides for payment of 100% to operational creditors and approximately 37% recovery to financial creditors — which, in the context of the complexity of this resolution, represents a commercially reasonable outcome.\"\n\nReliance Capital had been admitted into insolvency in November 2021 after defaulting on payments to its creditors. The insolvency resolution process saw intense litigation including challenges by minority shareholders and dissenting creditors.",
                'status'       => 'published',
                'is_featured'  => false,
                'is_breaking'  => false,
                'published_at' => now()->subHours(9),
            ],
            [
                'category_id'  => $crId,
                'author_id'    => $arjun,
                'title'        => 'Kerala HC: Mutual Consent Divorce Cannot Be Denied on Ground of Short Marriage Duration',
                'excerpt'      => 'The Kerala High Court overturned a family court order that refused to grant divorce citing "short matrimonial duration," holding that personal autonomy must guide such decisions.',
                'content'      => "The Kerala High Court has held that a Family Court cannot refuse a petition for divorce by mutual consent solely on the ground that the duration of the marriage was short, observing that such an approach intrudes upon the personal autonomy of the parties.\n\nJustice C.S. Dias, allowing an appeal against a Family Court order, observed:\n\n\"The legislature, in its wisdom, has provided a mechanism for divorce by mutual consent precisely to allow parties who have irreconcilably decided to end their marriage to do so with dignity and without adversarial litigation. The Family Court's paternalistic inquiry into the 'adequacy' of the marriage's duration has no basis in law.\"\n\nThe court held that once both parties have freely and independently consented to the divorce, the role of the court is limited to verifying the sincerity of the consent and ensuring there is no coercion — not to second-guess the parties' decision.\n\nThe divorce decree was granted accordingly.",
                'status'       => 'published',
                'is_featured'  => false,
                'is_breaking'  => false,
                'published_at' => now()->subDays(1),
            ],
            [
                'category_id'  => $cyberID,
                'author_id'    => $staff,
                'title'        => 'Delhi HC Issues Summons to Five Social Media Platforms in Deepfake Election Misinformation Petition',
                'excerpt'      => 'A division bench sought responses from Meta, X Corp, YouTube, Telegram and ShareChat on the regulatory failure to curb AI-generated political deepfakes.',
                'content'      => "The Delhi High Court has issued summons to five major social media intermediaries — Meta (Facebook and Instagram), X Corp (formerly Twitter), YouTube (Google), Telegram and ShareChat — in a batch petition seeking urgent judicial intervention to combat the spread of AI-generated deepfake videos targeting political candidates during elections.\n\nA division bench comprising Chief Justice Manmohan and Justice Tushar Rao Gedela, taking up the matter on priority given the proximity of state assembly elections, observed:\n\n\"The regulatory framework for AI-generated content appears inadequate. The IT Rules, as they presently stand, do not specifically address deepfakes in the electoral context. This court requires detailed responses from the platforms on their existing policies and removal mechanisms.\"\n\nThe petitioners — a consortium of electoral integrity organisations — submitted that deepfake videos showing political leaders making inflammatory statements were being widely circulated on these platforms with minimal moderation.\n\nThe platforms have been given four weeks to file their responses.",
                'status'       => 'published',
                'is_featured'  => false,
                'is_breaking'  => true,
                'published_at' => now()->subDays(1)->subHours(3),
            ],
            [
                'category_id'  => $scId,
                'author_id'    => $priya,
                'title'        => 'SC Refuses to Stay New IPC Provisions; Petitions Listed for January 2027 Hearing',
                'excerpt'      => 'The Supreme Court declined to stay the enforcement of Bharatiya Nyaya Sanhita provisions challenged as violating free speech and the right against self-incrimination.',
                'content'      => "The Supreme Court of India has declined to grant an interim stay on the operation of certain provisions of the Bharatiya Nyaya Sanhita, 2023 that are being challenged in a clutch of petitions as unconstitutional.\n\nA bench of Justices B.R. Gavai and A.G. Masih, listing the matter for final hearing in January 2027, observed that the petitioners had not made out a prima facie case for a stay at this stage, particularly given that the legislation had been through Parliamentary scrutiny.\n\nThe provisions under challenge include Section 152 BNS (acts endangering sovereignty, unity and integrity of India), which the petitioners argue is a reformulation of the colonial-era sedition law under Section 124A IPC that the Supreme Court had put in abeyance in May 2022.\n\nThe Solicitor General, appearing for the Union, submitted that the new provision has significant safeguards built in and cannot be equated with the old sedition law.\n\nThe petitioners have been given liberty to move for urgent listing if any individual is arrested or prosecuted under the challenged provisions.",
                'status'       => 'published',
                'is_featured'  => true,
                'is_breaking'  => true,
                'published_at' => now()->subMinutes(45),
            ],
        ];

        foreach ($items as $item) {
            LatestNews::create($item);
        }
    }
}
