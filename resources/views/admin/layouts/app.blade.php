<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin') — Nyay Vidhan CMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            background: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #1a1a2e;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            overflow-y: auto;
            transition: transform .3s ease;
        }

        .sidebar .brand {
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
        }

        .sidebar .brand a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .sidebar .brand span {
            color: #c9a84c;
        }

        .sidebar .nav-label {
            font-size: .65rem;
            font-weight: 600;
            letter-spacing: .08em;
            color: rgba(255, 255, 255, .4);
            padding: .75rem 1.25rem .25rem;
            text-transform: uppercase;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, .7);
            padding: .55rem 1.25rem;
            border-radius: 0;
            font-size: .88rem;
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background: rgba(255, 255, 255, .08);
        }

        .sidebar .nav-link i {
            font-size: 1rem;
            width: 1.2rem;
            text-align: center;
        }

        .main-wrap {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: .75rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar .page-title {
            font-weight: 600;
            font-size: 1.05rem;
            margin: 0;
        }

        .content-area {
            padding: 1.5rem;
        }

        .card {
            border: 0;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .07);
        }

        .badge-draft {
            background: #6c757d;
        }

        .badge-published {
            background: #198754;
        }

        .badge-archived {
            background: #dc3545;
        }

        .table th {
            font-size: .8rem;
            font-weight: 600;
            letter-spacing: .03em;
            text-transform: uppercase;
            color: #6c757d;
            background: #f8f9fa;
        }

        .btn-action {
            padding: .25rem .5rem;
            font-size: .8rem;
        }

        .stat-card {
            border-left: 4px solid;
        }

        .stat-card.primary {
            border-color: #0d6efd;
        }

        .stat-card.success {
            border-color: #198754;
        }

        .stat-card.warning {
            border-color: #ffc107;
        }

        .stat-card.info {
            border-color: #0dcaf0;
        }

        .stat-card.purple {
            border-color: #6f42c1;
        }

        .stat-card.danger {
            border-color: #dc3545;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .stat-label {
            font-size: .8rem;
            color: #6c757d;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            z-index: 1039;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-overlay.open {
                display: block;
            }

            .main-wrap {
                margin-left: 0;
            }

            .content-area {
                padding: 1rem;
            }

            .stat-number {
                font-size: 1.4rem;
            }

            .topbar-hamburger {
                display: flex;
            }
        }

        @media (max-width: 576px) {
            .content-area {
                padding: .75rem;
            }

            .topbar {
                padding: .6rem 1rem;
            }

            .topbar .page-title {
                font-size: .9rem;
            }
        }

        .topbar-hamburger {
            display: none;
            flex-direction: column;
            gap: 4px;
            cursor: pointer;
            padding: 6px;
            background: none;
            border: none;
            margin-right: 8px;
        }

        .topbar-hamburger span {
            display: block;
            width: 20px;
            height: 2px;
            background: #495057;
            border-radius: 2px;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="sidebar">
        <div class="brand">
            <a href="{{ route('admin.dashboard') }}">Nyay<span>Vidhan</span> Admin</a>
        </div>
        <nav class="mt-2">
            <div class="nav-label">Main</div>
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="nav-label">Content</div>
            <a href="{{ route('admin.articles.index') }}"
                class="nav-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
                <i class="bi bi-file-text"></i> Articles
            </a>
            <a href="{{ route('admin.judgments.index') }}"
                class="nav-link {{ request()->routeIs('admin.judgments*') ? 'active' : '' }}">
                <i class="bi bi-shield-check"></i> Judgments
            </a>
            <a href="{{ route('admin.latest-news.index') }}"
                class="nav-link {{ request()->routeIs('admin.latest-news*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> Latest News
            </a>
            <a href="{{ route('admin.interviews.index') }}"
                class="nav-link {{ request()->routeIs('admin.interviews*') ? 'active' : '' }}">
                <i class="bi bi-mic"></i> Interviews
            </a>
            <a href="{{ route('admin.opinions.index') }}"
                class="nav-link {{ request()->routeIs('admin.opinions*') ? 'active' : '' }}">
                <i class="bi bi-chat-quote"></i> Opinions
            </a>

            <div class="nav-label">Manage</div>
            <a href="{{ route('admin.authors.index') }}"
                class="nav-link {{ request()->routeIs('admin.authors*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Authors
            </a>
            <a href="{{ route('admin.categories.index') }}"
                class="nav-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Categories
            </a>
            <a href="{{ route('admin.tags.index') }}"
                class="nav-link {{ request()->routeIs('admin.tags*') ? 'active' : '' }}">
                <i class="bi bi-tag"></i> Tags
            </a>
            <a href="{{ route('admin.advertisements.index') }}"
                class="nav-link {{ request()->routeIs('admin.advertisements*') ? 'active' : '' }}">
                <i class="bi bi-megaphone"></i> Advertisements
            </a>

            <div class="nav-label">Account</div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="nav-link btn btn-link p-0 text-start w-100"
                    style="border:0;background:none;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </nav>
    </div>

    <div class="main-wrap">
        <div class="topbar">
            <div class="d-flex align-items-center">
                <button class="topbar-hamburger" id="sidebarToggle" aria-label="Toggle menu">
                    <span></span><span></span><span></span>
                </button>
                <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted small">{{ auth()->user()->name }}</span>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-box-arrow-up-right"></i> View Site
                </a>
            </div>
        </div>

        <div class="content-area">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
        (function() {
            var toggle = document.getElementById('sidebarToggle');
            var sidebar = document.querySelector('.sidebar');
            var overlay = document.getElementById('sidebarOverlay');
            if (toggle && sidebar && overlay) {
                toggle.addEventListener('click', function() {
                    sidebar.classList.toggle('open');
                    overlay.classList.toggle('open');
                });
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('open');
                });
            }
        })();
    </script>
</body>

</html>
