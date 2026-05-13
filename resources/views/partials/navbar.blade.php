<!-- Breaking News Bar -->
<div class="breaking-bar">
    <div class="breaking-label">
        <div class="breaking-dot"></div>
        Breaking News
    </div>
    <div class="marquee-wrap">
        <div class="marquee-track" id="marqueeTrack">
            @php $breaking = isset($breakingNews) ? $breakingNews : collect(); @endphp
            @if ($breaking->isNotEmpty())
                @foreach ($breaking as $bn)
                    <span class="marquee-item">{{ $bn->title }}</span>
                @endforeach
                @foreach ($breaking as $bn)
                    <span class="marquee-item">{{ $bn->title }}</span>
                @endforeach
            @else
                <span class="marquee-item">Welcome to Nyay Vidhan — India's Authoritative Legal News Source</span>
                <span class="marquee-item">Welcome to Nyay Vidhan — India's Authoritative Legal News Source</span>
            @endif
        </div>
    </div>
</div>

<!-- Utility Bar -->
<div class="util-bar">
    <div class="container">
        <div class="util-left">
            <span class="date-tag">{{ now()->format('l, F j, Y') }}</span>
            <span class="edition-pill">New Delhi Edition</span>
        </div>
        <div class="util-right">
            @auth
                <a href="{{ route('admin.dashboard') }}">Admin</a>
            @else
                <a href="{{ route('admin.login') }}">Admin Login</a>
            @endauth
        </div>
    </div>
</div>

<!-- Header -->
<header class="site-header" id="siteHeader">
    <div class="container">
        <div class="header-inner">
            <a href="{{ route('home') }}" class="logo-wrap">
                <div class="logo-name">Nyay <span>Vidhan</span></div>
                <div class="logo-tagline">India's Authoritative Legal News Source</div>
                <div class="logo-rule"><span></span><span></span></div>
            </a>

            <nav class="main-nav">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('latest-news') }}"
                    class="{{ request()->routeIs('latest-news*') ? 'active' : '' }}">Latest News</a>
                <a href="{{ route('judgments') }}"
                    class="{{ request()->routeIs('judgments*') ? 'active' : '' }}">Judgments</a>
                <a href="{{ route('articles') }}"
                    class="{{ request()->routeIs('articles*') ? 'active' : '' }}">Articles</a>
                <a href="{{ route('interviews') }}"
                    class="{{ request()->routeIs('interviews*') ? 'active' : '' }}">Interviews</a>
                <a href="{{ route('opinions') }}"
                    class="{{ request()->routeIs('opinions*') ? 'active' : '' }}">Opinions</a>
            </nav>

            <div class="header-actions">
                <button class="icon-btn" id="searchToggle" title="Search" aria-label="Search">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.2">
                        <circle cx="11" cy="11" r="7" />
                        <path d="M21 21l-4.35-4.35" />
                    </svg>
                </button>
                <div class="hamburger" id="hamburger" role="button" aria-label="Menu">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </div>
    <nav class="mobile-nav" id="mobileNav">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('latest-news') }}">Latest News</a>
        <a href="{{ route('judgments') }}">Judgments</a>
        <a href="{{ route('articles') }}">Articles</a>
        <a href="{{ route('interviews') }}">Interviews</a>
        <a href="{{ route('opinions') }}">Opinions</a>
    </nav>
</header>

<!-- Secondary Nav -->
<div class="nav-secondary">
    <div class="container">
        <a href="{{ route('latest-news') }}">Latest News</a>
        <a href="{{ route('judgments') }}">Judgments</a>
        <a href="{{ route('articles') }}">Articles</a>
        <a href="{{ route('interviews') }}">Interviews</a>
        <a href="{{ route('opinions') }}">Opinions</a>
    </div>
</div>
