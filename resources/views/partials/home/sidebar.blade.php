<aside class="sidebar-col">
    <!-- Trending Now -->
    <div class="sidebar-widget">
        <div class="widget-title">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" /><polyline points="17 6 23 6 23 12" />
            </svg>
            Trending Now
        </div>
        <div class="widget-body">
            @php
            $trending = [
                ['headline' => 'SC Refuses to Stay Implementation of New IPC Provisions; Hearing Listed Jan 2027', 'time' => '35 minutes ago'],
                ['headline' => 'Bombay HC Grants Bail to Journalist Arrested Under UAPA After 18 Months in Custody', 'time' => '2 hours ago'],
                ['headline' => 'Delhi HC Mandates Video Recording of All POCSO Trial Proceedings; Model Order Issued', 'time' => '3 hours ago'],
                ['headline' => 'CJI Announces Six New Fast-Track Commercial Courts in Tier-II Cities by December', 'time' => '5 hours ago'],
                ['headline' => 'SC Bar Association Condemns Physical Attack on Junior Lawyer Inside Court Premises', 'time' => '7 hours ago'],
            ];
            @endphp
            @foreach($trending as $i => $t)
            <div class="trending-item">
                <div class="trending-num">{{ $i + 1 }}</div>
                <div>
                    <div class="trending-headline">{{ $t['headline'] }}</div>
                    <div class="trending-time">{{ $t['time'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Ad Placeholder -->
    <div class="ad-box">
        <div class="ad-box-icon">📢</div>
        <div class="ad-box-label">Advertisement</div>
        <div class="ad-box-size">300 × 250 — Medium Rectangle</div>
    </div>

    <!-- Most Read -->
    <div class="sidebar-widget">
        <div class="widget-title">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" /><circle cx="12" cy="12" r="3" />
            </svg>
            Most Read
        </div>
        <div class="widget-body">
            @php
            $mostRead = [
                'What the New BNS Provisions Mean for Accused in Ongoing Trials: A Practical Explainer',
                '10 Key Amendments in the New Bharatiya Nagarik Suraksha Sanhita — Tabular Analysis',
                'SC Full Bench to Examine Whether WhatsApp Chats Are Admissible as Primary Evidence',
                'How to Challenge an Arbitral Award Under Section 34: A Step-by-Step Guide for Practitioners',
                'Gujarat HC: NRI Property Dispute Must Be Adjudicated in India If Property Is Situated Here',
            ];
            @endphp
            @foreach($mostRead as $i => $headline)
            <div class="most-read-item">
                <div class="mr-rank">{{ $i + 1 }}</div>
                <div class="mr-headline">{{ $headline }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Newsletter -->
    <div class="sidebar-widget newsletter-widget">
        <div class="widget-title">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" /><polyline points="22,6 12,13 2,6" />
            </svg>
            Daily Legal Digest
        </div>
        <livewire:forms.newsletter-form />
    </div>

    <!-- Second Ad -->
    <div class="ad-box" style="height: 180px">
        <div class="ad-box-icon">🏛️</div>
        <div class="ad-box-label">Law Firm Advertisement</div>
        <div class="ad-box-size">300 × 150</div>
    </div>
</aside>
