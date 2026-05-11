<h2 class="section-title"><span class="accent">Top</span> Stories</h2>

@if($heroArticles->isNotEmpty())
<div class="hero-grid">
    @php $main = $heroArticles->first(); @endphp
    <div class="hero-main">
        @if($main->image)
        <img src="{{ asset('storage/'.$main->image) }}" alt="{{ $main->title }}" loading="eager" />
        @else
        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=900&q=80" alt="{{ $main->title }}" loading="eager" />
        @endif
        <div class="hero-overlay">
            <div class="hero-meta">
                <span class="tag">{{ $main->category?->name ?? 'News' }}</span>
                <span class="hero-time">{{ $main->published_at?->diffForHumans() }}</span>
            </div>
            <h1 class="hero-headline">{{ $main->title }}</h1>
            <p class="hero-summary">{{ $main->excerpt }}</p>
            <a href="{{ route('articles.show', $main->slug) }}" class="hero-read-more">Read Full Story <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7" /></svg></a>
        </div>
    </div>
    <div class="hero-side">
        @foreach($heroArticles->skip(1) as $side)
        <div class="side-story">
            <div class="side-thumb">
                @if($side->image)
                <img src="{{ asset('storage/'.$side->image) }}" alt="{{ $side->title }}" />
                @else
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=200&q=75" alt="{{ $side->title }}" />
                @endif
            </div>
            <div class="side-body">
                <span class="tag">{{ $side->category?->name ?? 'News' }}</span>
                <h3 class="side-headline"><a href="{{ route('articles.show', $side->slug) }}" class="text-inherit text-decoration-none">{{ $side->title }}</a></h3>
                <div class="side-time">{{ $side->published_at?->diffForHumans() }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<div class="alert alert-info">No featured articles yet. <a href="{{ route('admin.articles.create') }}">Add content from the admin panel.</a></div>
@endif
