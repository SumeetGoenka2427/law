<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Interview;
use App\Models\Author;

class InterviewSeeder extends Seeder
{
    public function run(): void
    {
        $priya   = Author::where('slug', 'priya-menon')->value('id');
        $arjun   = Author::where('slug', 'arjun-krishnan')->value('id');
        $staff   = Author::where('slug', 'staff-reporter')->value('id');

        $interviews = [
            [
                'author_id'               => $staff,
                'title'                   => '"The Bar Must Lead on AI Ethics Before the Bench Is Forced to Rule" — Justice (Retd.) P.K. Vishwanathan',
                'interviewee_name'        => 'Justice (Retd.) P.K. Vishwanathan',
                'interviewee_designation' => 'Former Judge, Supreme Court of India',
                'excerpt'                 => 'In an exclusive conversation with TestLaw, former Supreme Court judge P.K. Vishwanathan urges the Bar Council to proactively frame AI usage guidelines before courts are compelled to regulate through litigation.',
                'content'                 => "**TestLaw:** Justice Vishwanathan, you recently spoke at the SILF conference on AI in courts. What is your central concern?\n\n**Justice Vishwanathan:** My central concern is that we are already seeing AI-generated documents, AI-summarised case law and even AI-drafted plaints being submitted in courts — without any disclosure. If a lawyer submits a brief that was substantially written by an AI and that AI has hallucinated a citation, who is responsible? The court, the lawyer, the AI company? We have no framework for this.\n\n**TestLaw:** Should the Supreme Court issue guidelines?\n\n**Justice Vishwanathan:** I would prefer the Bar Council of India and the Bar Associations to act first. Courts are reactive institutions — they rule on disputes that come before them. The Bar is a self-governing profession. It should govern itself. The danger is that if the bar does not act, a litigant will be prejudiced by an AI error, they will complain, and then the court will be forced to frame rules in the heat of a specific controversy. That is the worst way to make policy.\n\n**TestLaw:** What specific rules would you recommend?\n\n**Justice Vishwanathan:** Three things at minimum. First, mandatory disclosure when AI has been used to draft or research any document submitted to a court. Second, the certifying advocate must personally verify every citation regardless of how it was generated. Third, the Bar Council should maintain a list of approved legal AI tools that have been tested for accuracy with Indian case law. Right now, most of these tools have been trained primarily on US and UK data and they are unreliable on Indian statutory interpretation.\n\n**TestLaw:** How receptive is the judiciary to this?\n\n**Justice Vishwanathan:** More than you might think. I have spoken to several sitting judges who are themselves using AI tools to research background to cases — not for judgment-writing, they are careful about that — but for understanding technical subjects. One judge told me he used an AI tool to understand the technical specifications in a patent dispute and found it very useful. But judges also know the risks. I think there is genuine appetite for a sensible regulatory framework. The ball is in the Bar's court.\n\n**TestLaw:** What about AI-generated evidence — deepfakes, synthetic audio?\n\n**Justice Vishwanathan:** This is the most urgent frontier. We had no statutory framework for electronic evidence authentication that keeps pace with the sophistication of forgery today. The Indian Evidence Act amendments help somewhat, but the courts need forensic infrastructure — certified laboratories that can examine AI-generated content. Without that, we will have judges ruling on deepfakes without the technical tools to verify them. That is a recipe for injustice.",
                'status'                  => 'published',
                'is_featured'             => true,
                'published_at'            => now()->subDays(3),
                'meta_title'              => 'Justice Vishwanathan on AI Ethics in Indian Courts — Exclusive Interview',
                'meta_description'        => 'Former Supreme Court judge P.K. Vishwanathan speaks to TestLaw on AI regulation in Indian courts, Bar Council responsibility and deepfake evidence.',
            ],
            [
                'author_id'               => $priya,
                'title'                   => '"India\'s Arbitration Framework Has the Right Architecture But Weak Execution" — Senior Advocate Krishnamurthy',
                'interviewee_name'        => 'Senior Advocate Ramesh Krishnamurthy',
                'interviewee_designation' => 'Senior Advocate, Supreme Court of India; Former Additional Solicitor General',
                'excerpt'                 => 'Senior Advocate Ramesh Krishnamurthy speaks to Priya Menon about India\'s arbitration reforms, the persistent enforcement bottleneck, and why Singapore remains the preferred seat despite the government\'s push for Mumbai.',
                'content'                 => "**TestLaw:** You have been a vocal critic of the pace of India's arbitration reforms. Where do we stand today?\n\n**Senior Advocate Krishnamurthy:** Let me be precise. I am not a critic of the reforms — the 2015 and 2019 amendments to the Arbitration and Conciliation Act were largely well-conceived. What I critique is the implementation gap. We have a statute that looks good on paper. But parties still wait 18 months for a Section 34 challenge to be heard in the High Courts. That is not international arbitration-friendly. Dubai, Singapore and London do not have that problem.\n\n**TestLaw:** What specifically causes the enforcement bottleneck?\n\n**Senior Advocate Krishnamurthy:** Three things. First, the bar has not internalised the minimal intervention principle. Lawyers still file Section 34 petitions challenging awards on the merits dressed up as public policy arguments. Second, commercial courts, while established, are still learning to manage their dockets efficiently. Third — and this is underappreciated — we have inadequate specialised bench strength. International arbitration is technically demanding. Not every judge assigned to a commercial court has the background to assess a complex engineering or financial dispute.\n\n**TestLaw:** The government has been promoting Mumbai as an international arbitration hub. Is that realistic?\n\n**Senior Advocate Krishnamurthy:** Mumbai has genuine strengths — financial centre, port proximity, large legal market. But institutional credibility takes decades to build. Singapore's success is built on 30 years of consistent judicial discipline in minimal intervention, excellent infrastructure and a neutral political reputation. India needs to demonstrate that a foreign party can seat an arbitration here, get an award in 18 months, and have the award honoured without five rounds of litigation. We are not there yet, but the trajectory is positive if the reforms are sustained.\n\n**TestLaw:** What one reform would make the biggest difference?\n\n**Senior Advocate Krishnamurthy:** Dedicated arbitration benches in every High Court, with judges who have completed specialised training and have a minimum two-year term on that bench. Continuity and expertise — those two things would transform the landscape faster than any legislative amendment.",
                'status'                  => 'published',
                'is_featured'             => true,
                'published_at'            => now()->subDays(6),
                'meta_title'              => 'India\'s Arbitration Reforms — Interview with Senior Advocate Krishnamurthy',
                'meta_description'        => 'Senior Advocate Ramesh Krishnamurthy discusses India\'s arbitration framework, enforcement challenges and Mumbai\'s prospects as an international hub.',
            ],
            [
                'author_id'               => $arjun,
                'title'                   => '"POCSO Courts Are Collapsing Under Backlog — Justice Demands Structural Reform" — Justice (Retd.) Shalini Bhatt',
                'interviewee_name'        => 'Justice (Retd.) Shalini Bhatt',
                'interviewee_designation' => 'Former Judge, Bombay High Court; POCSO Oversight Committee Member',
                'excerpt'                 => 'Justice Shalini Bhatt, who chaired a High-Level Committee on POCSO implementation, tells TestLaw that without dedicated funding, trained judges and witness protection, the law\'s promise remains unfulfilled.',
                'content'                 => "**TestLaw:** The POCSO Act was heralded as a landmark. Ten years later, what is your assessment?\n\n**Justice Bhatt:** The statute itself is sound — child-sensitive procedures, mandatory timelines, special courts, in-camera hearings. But the gap between the statute and ground reality is severe. We found in our committee's survey that only 28% of POCSO special courts across India had a dedicated courtroom. The rest were sharing space with regular criminal courts. Can you imagine conducting an in-camera child witness examination when the court is double-booked?\n\n**TestLaw:** What about the mandatory one-year trial timeline?\n\n**Justice Bhatt:** Almost universally breached. The national average trial completion time in POCSO cases is four years and three months. The reasons are structural — understaffed courts, inadequate forensic labs, backlogged DNA testing, police who are not trained in child-sensitive investigation. Children become adults during these trials and sometimes refuse to continue testifying. The trauma of repeated court appearances breaks families.\n\n**TestLaw:** What is the single most important reform?\n\n**Justice Bhatt:** Witness protection and support. The conviction rate in POCSO cases is low partly because children retract their statements under family pressure or fear. If we had a robust witness protection programme — safe houses, counsellors at every special court, video-link examination as the default not the exception — we would see dramatically different outcomes. Some High Courts have issued model orders on this. But without central funding, states are not implementing them.\n\n**TestLaw:** Is there political will for these reforms?\n\n**Justice Bhatt:** There is political will to pass laws. There is less will to fund implementation. Every state government I have spoken to agrees that POCSO courts need more resources. But it competes with a hundred other budget priorities. What we need is a centrally-sponsored scheme specifically for POCSO court infrastructure — dedicated courts, trained personnel, forensic capacity. I am hopeful that the new National Mission for Children's Justice will address this, but I have been hopeful before.",
                'status'                  => 'published',
                'is_featured'             => false,
                'published_at'            => now()->subDays(10),
                'meta_title'              => 'POCSO Court Reforms — Interview with Justice (Retd.) Shalini Bhatt',
                'meta_description'        => 'Former Bombay HC judge Shalini Bhatt speaks on POCSO court backlogs, witness protection failures and the reforms needed for effective child justice.',
            ],
        ];

        foreach ($interviews as $data) {
            Interview::create($data);
        }
    }
}
