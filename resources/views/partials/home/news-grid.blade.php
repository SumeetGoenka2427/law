<h2 class="section-title"><span class="accent">Latest</span> News</h2>
<div class="news-grid">
    @php
    $newsItems = [
        ['img' => 'photo-1589829545856-d10d557cf95f', 'tag' => 'Supreme Court', 'tag_class' => '', 'headline' => 'SC Stays Calcutta HC Order Granting Anticipatory Bail to Former Bengal Minister in Coal Scam', 'desc' => 'The Supreme Court bench expressed strong concern over the manner in which the HC granted relief, noting that the order was "cryptic and non-reasoned."', 'date' => 'Today, 10:32 AM', 'author' => 'By Staff Reporter'],
        ['img' => 'photo-1436450412740-6b988f486c6b', 'tag' => 'Bombay HC', 'tag_class' => 'navy', 'headline' => 'Bombay High Court: Employer Cannot Terminate Employee on Basis of Medical Leave Alone — Disability Rights', 'desc' => 'Invoking Article 21 and Persons with Disabilities Act, the division bench held that termination triggered solely by prolonged medical leave amounts to discrimination.', 'date' => 'Today, 9:15 AM', 'author' => 'By Priya Menon'],
        ['img' => 'photo-1450101499163-c8848c66ca85', 'tag' => 'Corporate', 'tag_class' => 'gold', 'headline' => 'NCLT Approves Insolvency Resolution Plan for Reliance Capital; CoC Votes 94% in Favour of Hinduja Bid', 'desc' => 'The National Company Law Tribunal\'s Mumbai bench approved the ₹9,650 crore resolution plan submitted by Hinduja Group in a marathon hearing spanning two days.', 'date' => 'Yesterday, 6:45 PM', 'author' => 'By Kiran Nair'],
        ['img' => 'photo-1589391886645-d51941baf7fb', 'tag' => 'Criminal', 'tag_class' => '', 'headline' => 'Madras HC: Confession Before Police Officer Inadmissible Even If Spontaneous; Section 25 Evidence Act Absolute Bar', 'desc' => 'Citing a long line of apex court precedents, Justice Murali Shankar reiterated that any confession recorded by or before a police officer carries no evidentiary value whatsoever.', 'date' => 'Yesterday, 3:20 PM', 'author' => 'By Arjun Krishnan'],
        ['img' => 'photo-1521791055366-0d553872952f', 'tag' => 'Family Law', 'tag_class' => 'green', 'headline' => 'Kerala HC: Mutual Consent Divorce Cannot Be Denied on Ground of Short Marriage Duration; Liberty Is Paramount', 'desc' => 'The Kerala High Court overturned a family court order that had refused to grant divorce citing a "short matrimonial duration," holding that personal autonomy must guide such decisions.', 'date' => 'Apr 18, 2026', 'author' => 'By Staff Reporter'],
        ['img' => 'photo-1516321318423-f06f85e504b3', 'tag' => 'Cyber Law', 'tag_class' => 'navy', 'headline' => 'Delhi HC Issues Summons to Five Social Media Platforms in Deepfake Election Misinformation Batch Petition', 'desc' => 'A division bench sought responses from Meta, X Corp, YouTube, Telegram and ShareChat on the regulatory failure to curb AI-generated political deepfakes.', 'date' => 'Apr 18, 2026', 'author' => 'By Tech Desk'],
    ];
    @endphp

    @foreach($newsItems as $item)
    <article class="news-card">
        <div class="news-card-img">
            <img src="https://images.unsplash.com/{{ $item['img'] }}?w=400&q=75" alt="{{ $item['tag'] }}" />
            <span class="tag {{ $item['tag_class'] }}">{{ $item['tag'] }}</span>
        </div>
        <div class="news-card-body">
            <h3 class="news-headline">{{ $item['headline'] }}</h3>
            <p class="news-desc">{{ $item['desc'] }}</p>
            <div class="news-footer">
                <div class="news-date">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" /><path d="M12 6v6l4 2" />
                    </svg>
                    {{ $item['date'] }}
                </div>
                <span class="news-author">{{ $item['author'] }}</span>
            </div>
        </div>
    </article>
    @endforeach
</div>
