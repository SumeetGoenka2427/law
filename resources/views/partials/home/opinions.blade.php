<h2 class="section-title"><span class="accent">Opinions</span> &amp; Analysis</h2>
<div class="opinion-grid">
    @php
    $opinions = [
        ['img' => 'photo-1507003211169-0a1dd7228f2d', 'avatar' => 'photo-1472099645785-5658abf4ff4e', 'label' => 'Opinion', 'headline' => "Why India's Arbitration Regime Needs a Course Correction Before the Next Decade", 'preview' => "India's ambitious arbitration reforms have created a framework that looks good on paper but stumbles in practice. The backlog at the Delhi International Arbitration Centre, the persistent enforcement bottlenecks and the brain drain of top arbitrators to Singapore deserve urgent attention.", 'author_name' => 'Senior Advocate Ramesh Krishnamurthy', 'author_role' => 'Chambers, Supreme Court of India'],
        ['img' => 'photo-1573496799652-408c2ac9fe98', 'avatar' => 'photo-1580489944761-15a19d654956', 'label' => 'Analysis', 'headline' => "The DPDP Act's 'Consent Framework' — A Comparative Study with GDPR's Legitimate Interest Doctrine", 'preview' => "The Digital Personal Data Protection Act 2023 leans heavily on consent as the primary ground for processing, yet fails to incorporate GDPR's robust \"legitimate interests\" balancing test, creating a regulatory vacuum.", 'author_name' => 'Dr. Neha Srivastava', 'author_role' => 'Professor of Law, NLU Delhi'],
        ['img' => 'photo-1560250097-0b93528c311a', 'avatar' => 'photo-1500648767791-00dcc994a43e', 'label' => 'Column', 'headline' => 'Judicial Accountability Without Judicial Independence: Navigating the Thin Constitutional Line', 'preview' => 'As calls for increased scrutiny of the higher judiciary grow louder, we must resist the temptation to import accountability mechanisms that are incompatible with a constitutional culture built on separation of powers.', 'author_name' => 'Adv. Siddharth Balachandran', 'author_role' => 'Constitutional Law Practitioner, Madras Bar'],
        ['img' => 'photo-1542744094-3a31f272c490', 'avatar' => 'photo-1519085360753-af0119f7cbe7', 'label' => 'Interview', 'headline' => '"The Bar Must Lead on AI Ethics Before the Bench Is Forced to Rule": Exclusive Interview with Justice (Retd.) P.K. Vishwanathan', 'preview' => 'In an exclusive conversation with TestLaw, former Supreme Court judge P.K. Vishwanathan urges the Bar Council to proactively frame AI usage guidelines.', 'author_name' => 'Justice (Retd.) P.K. Vishwanathan', 'author_role' => 'Former Judge, Supreme Court of India'],
    ];
    @endphp

    @foreach($opinions as $o)
    <div class="opinion-card">
        <div class="opinion-card-img">
            <img src="https://images.unsplash.com/{{ $o['img'] }}?w=500&q=75" alt="{{ $o['author_name'] }}" />
        </div>
        <div class="opinion-stripe"></div>
        <div class="opinion-card-body">
            <div class="opinion-label">{{ $o['label'] }}</div>
            <h3 class="opinion-headline">{{ $o['headline'] }}</h3>
            <p class="opinion-preview">{{ $o['preview'] }}</p>
            <div class="author-row">
                <div class="author-avatar">
                    <img src="https://images.unsplash.com/{{ $o['avatar'] }}?w=80&q=75" alt="{{ $o['author_name'] }}" />
                </div>
                <div class="author-info">
                    <div class="author-name">{{ $o['author_name'] }}</div>
                    <div class="author-role">{{ $o['author_role'] }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
