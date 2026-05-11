<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'TestLaw — India\'s Premier Legal News Portal')</title>
    <meta name="description" content="@yield('meta_description', 'India\'s most trusted source for legal news, court judgments, legislative updates and expert opinions.')">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <!-- Search Modal -->
    <div class="search-modal" id="searchModal">
        <span class="search-close" id="searchClose">✕</span>
        <div class="search-modal-inner">
            <div class="search-input-wrap">
                <input type="text" placeholder="Search judgments, articles, case names…" id="searchInput" autocomplete="off" />
                <button class="search-submit" aria-label="Search">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="11" cy="11" r="7" /><path d="M21 21l-4.35-4.35" />
                    </svg>
                </button>
            </div>
            <p class="search-hint">Popular: POCSO, IBC, Electoral Bond, Article 370, NDPS Act, Bail Conditions, SC Contempt</p>
        </div>
    </div>

    <!-- Scroll to Top -->
    <button class="scroll-top" id="scrollTop" aria-label="Scroll to top">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M12 19V5M5 12l7-7 7 7" />
        </svg>
    </button>

    @livewireScripts
</body>
</html>
