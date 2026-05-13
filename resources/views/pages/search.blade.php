@extends('layouts.app')
@section('title', $q ? 'Search: ' . e($q) . ' — Nyay Vidhan' : 'Search — Nyay Vidhan')
@section('meta_description', 'Search results for ' . e($q) . ' on Nyay Vidhan.')

@section('content')
    <main>
        <div class="container">
            <div class="page-layout">
                <div class="mt-4 mb-4">
                    <form method="GET" action="{{ route('search') }}" class="d-flex gap-2">
                        <input type="text" name="q" value="{{ e($q) }}" class="form-control form-control-lg"
                            placeholder="Search judgments, articles, case names…" autofocus />
                        <button type="submit" class="btn btn-dark btn-lg px-4">Search</button>
                    </form>
                </div>

                @if (strlen($q) >= 2)
                    <p class="text-muted mb-4">
                        @if ($total > 0)
                            Found <strong>{{ $total }}</strong> result{{ $total !== 1 ? 's' : '' }} for
                            <strong>"{{ e($q) }}"</strong>
                        @else
                            No results found for <strong>"{{ e($q) }}"</strong>. Try different keywords.
                        @endif
                    </p>

                    @forelse($results as $result)
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span
                                    class="badge rounded-pill
                                @if ($result['type'] === 'Article') bg-primary
                                @elseif($result['type'] === 'Judgment') bg-dark
                                @elseif($result['type'] === 'Interview') bg-warning text-dark
                                @elseif($result['type'] === 'Opinion') text-white
                                @else bg-danger @endif"
                                    @if ($result['type'] === 'Opinion') style="background:#1a1a2e" @endif>
                                    {{ $result['type'] }}
                                </span>
                                @if ($result['category'])
                                    <span class="text-muted small">{{ $result['category'] }}</span>
                                @endif
                            </div>
                            <h3 class="h5 mb-1">
                                <a href="{{ $result['url'] }}"
                                    class="text-decoration-none text-dark">{{ $result['title'] }}</a>
                            </h3>
                            @if ($result['excerpt'])
                                <p class="text-muted small mb-1">{{ Str::limit($result['excerpt'], 180) }}</p>
                            @endif
                            <div class="text-muted small d-flex gap-3">
                                @if ($result['author'])
                                    <span>{{ $result['author'] }}</span>
                                @endif
                                @if ($result['published_at'])
                                    <span>{{ $result['published_at']->diffForHumans() }}</span>
                                @endif
                            </div>
                        </div>
                    @empty
                    @endforelse
                @elseif(strlen($q) > 0)
                    <p class="text-muted">Please enter at least 2 characters to search.</p>
                @else
                    <div class="text-center py-5 text-muted">
                        <p class="mb-1">Search across all legal content — articles, judgments, interviews, opinions, and
                            news.</p>
                        <p class="small">Popular: POCSO, IBC, Electoral Bond, Article 370, NDPS Act, BNS, DPDP Act</p>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
