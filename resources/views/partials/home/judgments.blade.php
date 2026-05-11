<div class="judgments-section">
    <h2 class="section-title">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
        </svg>
        Judgment <span class="accent">Highlights</span>
    </h2>
    <div class="judgment-list">
        @php
        $judgments = [
            ['num' => '01', 'court' => 'Supreme Court of India', 'title' => 'Vikram Enterprises vs Union of India & Ors. (Civil Appeal No. 4512/2026)', 'summary' => 'Held that mandatory pre-deposit under GST Act before filing appeal does not violate Article 14 or Article 19(1)(g). Doctrine of legitimate expectation does not apply to tax statutes that are prospectively amended by Parliament.', 'date' => 'Decided: April 17, 2026 | Bench: Justices Oka & Agarwal'],
            ['num' => '02', 'court' => 'Delhi High Court', 'title' => 'Priya Sharma vs State of Delhi & Anr. (W.P.(C) 8821/2025)', 'summary' => 'Directed Delhi Police to pay ₹5 lakh compensation to victim of custodial harassment. Court invoked constitutional tort doctrine holding the State vicariously liable for fundamental rights violations by its officers.', 'date' => 'Decided: April 16, 2026 | Justice Rekha Palli'],
            ['num' => '03', 'court' => 'National Green Tribunal — Principal Bench', 'title' => 'Green Advocates Forum vs MoEFCC (O.A. No. 217/2026)', 'summary' => 'Imposed ₹50 crore environmental compensation on a private conglomerate for illegally diverting forest land in Aravalli without prior approval under the Forest Conservation Act, 1980. Restoration plan ordered within 90 days.', 'date' => 'Decided: April 15, 2026 | Chairperson Justice AK Goel'],
            ['num' => '04', 'court' => 'Bombay High Court', 'title' => 'Hindustan Unilever Ltd. vs Competition Commission of India (Writ Petition 1204/2025)', 'summary' => 'Upheld CCI\'s jurisdiction to investigate anti-competitive pricing in FMCG distribution chains even when agreements are vertical in nature. Dismissed challenge to dawn raid, holding CCI\'s investigative powers are quasi-administrative, not quasi-judicial at investigation stage.', 'date' => 'Decided: April 14, 2026 | Division Bench'],
        ];
        @endphp

        @foreach($judgments as $j)
        <div class="judgment-item">
            <div class="judgment-num">{{ $j['num'] }}</div>
            <div class="judgment-content">
                <div class="judgment-court">{{ $j['court'] }}</div>
                <div class="judgment-title">{{ $j['title'] }}</div>
                <div class="judgment-summary">{{ $j['summary'] }}</div>
                <div class="judgment-date">{{ $j['date'] }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
