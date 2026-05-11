<h2 class="section-title"><span class="accent">Opinions</span> &amp; Analysis</h2>
<div class="opinion-grid">
    @forelse($opinions as $o)
    <div class="opinion-card">
        <div class="opinion-card-img">
            @if($o->image)
            <img src="{{ asset('storage/'.$o->image) }}" alt="{{ $o->title }}" />
            @elseif($o->author?->image)
            <img src="{{ asset('storage/'.$o->author->image) }}" alt="{{ $o->author->name }}" />
            @else
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&q=75" alt="{{ $o->title }}" />
            @endif
        </div>
        <div class="opinion-stripe"></div>
        <div class="opinion-card-body">
            <div class="opinion-label">Opinion</div>
            <h3 class="opinion-headline">{{ $o->title }}</h3>
            <p class="opinion-preview">{{ $o->excerpt }}</p>
            @if($o->author)
            <div class="author-row">
                <div class="author-avatar">
                    @if($o->author->image)
                    <img src="{{ asset('storage/'.$o->author->image) }}" alt="{{ $o->author->name }}" />
                    @else
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="width:36px;height:36px">{{ substr($o->author->name,0,1) }}</div>
                    @endif
                </div>
                <div class="author-info">
                    <div class="author-name">{{ $o->author->name }}</div>
                    <div class="author-role">{{ $o->author->designation }}</div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @empty
    <p class="text-muted col-span-full">No opinions published yet. <a href="{{ route('admin.opinions.create') }}">Add one from admin.</a></p>
    @endforelse
</div>
