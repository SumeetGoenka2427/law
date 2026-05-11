<h2 class="section-title"><span class="accent">Latest</span> News</h2>
<div class="news-grid">
    @forelse($latestNews as $item)
    <article class="news-card">
        <div class="news-card-img">
            @if($item->image)
            <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" />
            @else
            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=75" alt="{{ $item->title }}" />
            @endif
            <span class="tag">{{ $item->category?->name ?? 'News' }}</span>
        </div>
        <div class="news-card-body">
            <h3 class="news-headline"><a href="{{ route('latest-news.show', $item->slug) }}" class="text-inherit text-decoration-none">{{ $item->title }}</a></h3>
            <p class="news-desc">{{ $item->excerpt }}</p>
            <div class="news-footer">
                <div class="news-date">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10" /><path d="M12 6v6l4 2" /></svg>
                    {{ $item->published_at?->diffForHumans() }}
                </div>
                @if($item->author)
                <span class="news-author">By {{ $item->author->name }}</span>
                @endif
            </div>
        </div>
    </article>
    @empty
    <p class="text-muted">No news published yet.</p>
    @endforelse
</div>
