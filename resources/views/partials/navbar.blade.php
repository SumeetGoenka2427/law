<!-- Breaking News Bar -->
<div class="breaking-bar">
    <div class="breaking-label">
        <div class="breaking-dot"></div>
        Breaking News
    </div>
    <div class="marquee-wrap">
        <div class="marquee-track" id="marqueeTrack">
            <span class="marquee-item">Supreme Court upholds Right to Privacy in landmark digital data case involving Meta India</span>
            <span class="marquee-item">Delhi High Court directs CBI to submit final report in judicial appointments corruption probe</span>
            <span class="marquee-item">Bombay HC stays ordinance on OBC quota expansion pending constitutional review</span>
            <span class="marquee-item">SC bench constituted to examine validity of electoral bond scheme; hearing Dec 12</span>
            <span class="marquee-item">Madras HC strikes down Tamil Nadu police circular restricting bail applications</span>
            <span class="marquee-item">AG for India defends demonetisation verdict before five-judge constitutional bench</span>
            <span class="marquee-item">Allahabad HC issues contempt notice to UP officials over delayed POCSO trials</span>
            <span class="marquee-item">NALSA launches legal aid drive for prison inmates; targets 50 lakh beneficiaries by 2025</span>
            <!-- Duplicate for seamless loop -->
            <span class="marquee-item">Supreme Court upholds Right to Privacy in landmark digital data case involving Meta India</span>
            <span class="marquee-item">Delhi High Court directs CBI to submit final report in judicial appointments corruption probe</span>
            <span class="marquee-item">Bombay HC stays ordinance on OBC quota expansion pending constitutional review</span>
            <span class="marquee-item">SC bench constituted to examine validity of electoral bond scheme; hearing Dec 12</span>
            <span class="marquee-item">Madras HC strikes down Tamil Nadu police circular restricting bail applications</span>
            <span class="marquee-item">AG for India defends demonetisation verdict before five-judge constitutional bench</span>
            <span class="marquee-item">Allahabad HC issues contempt notice to UP officials over delayed POCSO trials</span>
            <span class="marquee-item">NALSA launches legal aid drive for prison inmates; targets 50 lakh beneficiaries by 2025</span>
        </div>
    </div>
</div>

<!-- Utility Bar -->
<div class="util-bar">
    <div class="container">
        <div class="util-left">
            <span class="date-tag">{{ now()->format('l, F j, Y') }}</span>
            <span class="edition-pill">New Delhi Edition</span>
            <a href="#">ePaper</a>
            <a href="#">Print Edition</a>
        </div>
        <div class="util-right">
            <a href="#">Sign In</a>
            <a href="#">Register</a>
            <a href="#">Advertise</a>
        </div>
    </div>
</div>

<!-- Header -->
<header class="site-header" id="siteHeader">
    <div class="container">
        <div class="header-inner">
            <a href="{{ route('home') }}" class="logo-wrap">
                <div class="logo-name">Test<span>Law</span></div>
                <div class="logo-tagline">India's Authoritative Legal News Source</div>
                <div class="logo-rule"><span></span><span></span></div>
            </a>

            <nav class="main-nav">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('latest-news') }}" class="{{ request()->routeIs('latest-news') ? 'active' : '' }}">Latest News</a>
                <a href="{{ route('judgments') }}" class="{{ request()->routeIs('judgments*') ? 'active' : '' }}">Judgments</a>
                <a href="{{ route('articles') }}" class="{{ request()->routeIs('articles*') ? 'active' : '' }}">Articles</a>
                <a href="{{ route('interviews') }}" class="{{ request()->routeIs('interviews') ? 'active' : '' }}">Interviews</a>
                <a href="#">Columns</a>
                <a href="#">Legislation</a>
                <a href="#">Contact</a>
            </nav>

            <div class="header-actions">
                <button class="icon-btn" id="searchToggle" title="Search" aria-label="Search">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <circle cx="11" cy="11" r="7" /><path d="M21 21l-4.35-4.35" />
                    </svg>
                </button>
                <button class="icon-btn" title="Bookmark" aria-label="Bookmarks">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z" />
                    </svg>
                </button>
                <a href="#" class="subscribe-btn">Subscribe</a>
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
        <a href="#">Columns</a>
        <a href="#">Legislation</a>
        <a href="#">Contact</a>
    </nav>
</header>

<!-- Secondary Nav -->
<div class="nav-secondary">
    <div class="container">
        <a href="#" class="{{ request()->routeIs('home') ? 'active' : '' }}">Supreme Court</a>
        <a href="#">High Courts</a>
        <a href="#">District Courts</a>
        <a href="#">Tribunals</a>
        <a href="#">Constitutional Law</a>
        <a href="#">Criminal Law</a>
        <a href="#">Corporate Law</a>
        <a href="#">Family Law</a>
        <a href="#">Cyber Law</a>
        <a href="#">International Law</a>
        <a href="#">Law School</a>
        <a href="#">Bar &amp; Bench</a>
    </div>
</div>
