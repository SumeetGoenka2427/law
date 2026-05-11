<h2 class="section-title"><span class="accent">In</span> Pictures</h2>
<div class="visual-grid">
    @php
    $visuals = [
        ['img' => 'photo-1589829545856-d10d557cf95f', 'cat' => 'Supreme Court', 'title' => 'Inside the Constitution Bench Hearing Room'],
        ['img' => 'photo-1450101499163-c8848c66ca85', 'cat' => 'Corporate Law', 'title' => 'The New Faces of M&A Law in India'],
        ['img' => 'photo-1521791055366-0d553872952f', 'cat' => 'Bar & Bench', 'title' => 'NLU Graduates Redefining Legal Aid'],
        ['img' => 'photo-1507679799987-c73779587ccf', 'cat' => 'Legal Tech', 'title' => 'AI Tools Transforming Court Research'],
    ];
    @endphp

    @foreach($visuals as $v)
    <div class="visual-card">
        <img src="https://images.unsplash.com/{{ $v['img'] }}?w=300&q=70" alt="{{ $v['cat'] }}" />
        <div class="visual-card-overlay">
            <div class="visual-card-cat">{{ $v['cat'] }}</div>
            <div class="visual-card-title">{{ $v['title'] }}</div>
        </div>
    </div>
    @endforeach
</div>
