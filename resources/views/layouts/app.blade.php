<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="From My Stove To Yours — a culinary blog celebrating world cuisines, recipes, stories and techniques.">
    <title>From My Stove To Yours</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --gold:       #c9a84c;
            --gold-light: #e2c97e;
            --gold-dark:  #9e7a2e;
            --ink:        #1a1209;
            --parchment:  #faf6ee;
            --charcoal:   #2c2416;
            --warm-gray:  #7a6e5e;
            --card-bg:    #ffffff;
            --border-light: #ede6d8;
            --input-bg:   #ffffff;
            --footer-bg:  #1a1209;
            --footer-text: #7a6e5e;
        }
        [data-theme="dark"] {
            --ink:        #f0e8da;
            --parchment:  #120d07;
            --charcoal:   #e0d5c1;
            --warm-gray:  #a39585;
            --card-bg:    #1a130a;
            --border-light: #2c2416;
            --input-bg:   #1a130a;
            --footer-bg:  #0a0704;
            --footer-text: #a39585;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--parchment);
            color: var(--charcoal);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        h1, h2, h3, .serif { font-family: 'Cormorant Garamond', Georgia, serif; }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--parchment); }
        ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 99px; }

        /* ── Navbar ── */
        .navbar {
            background: rgba(26,18,9,0.97);
            backdrop-filter: blur(16px);
            position: sticky; top: 0; z-index: 100;
            border-bottom: 1px solid rgba(201,168,76,.25);
        }
        .navbar-inner {
            max-width: 1280px; margin: auto;
            padding: 0 2rem;
            display: flex; align-items: center; justify-content: space-between;
            height: 72px;
        }
        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.45rem; font-weight: 600;
            color: var(--gold-light);
            text-decoration: none;
            letter-spacing: .03em;
            display: flex; align-items: center; gap: .5rem;
        }
        .logo-icon { font-size: 1.6rem; }
        .nav-links { display: flex; align-items: center; gap: 1.8rem; }
        .nav-links a {
            color: #c8bfaf; text-decoration: none; font-size: .875rem;
            font-weight: 500; letter-spacing: .03em;
            transition: color .2s;
        }
        .nav-links a:hover, .nav-links a.active { color: var(--gold-light); }
        .nav-links a.active { border-bottom: 1px solid var(--gold); padding-bottom: 2px; }

        /* ── Buttons ── */
        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
            color: var(--ink); font-weight: 600; font-size: .875rem;
            padding: .6rem 1.5rem; border-radius: 99px;
            border: none; cursor: pointer; text-decoration: none;
            display: inline-flex; align-items: center; gap: .4rem;
            transition: transform .2s, box-shadow .2s, filter .2s;
            box-shadow: 0 2px 12px rgba(201,168,76,.3);
        }
        .btn-gold:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(201,168,76,.45); filter: brightness(1.08); }
        .btn-outline {
            background: transparent; color: var(--warm-gray);
            border: 1.5px solid #d4c9b6; border-radius: 99px;
            padding: .55rem 1.3rem; font-size: .875rem; font-weight: 500;
            cursor: pointer; text-decoration: none;
            display: inline-flex; align-items: center; gap: .4rem;
            transition: border-color .2s, color .2s, background .2s;
        }
        .btn-outline:hover { border-color: var(--gold); color: var(--gold-dark); background: rgba(201,168,76,.06); }

        /* ── Main ── */
        .main { flex: 1; max-width: 1280px; margin: auto; padding: 2.5rem 2rem; width: 100%; }

        /* ── Toast ── */
        .toast {
            padding: .9rem 1.4rem;
            background: #1e3a2e; color: #7fc99d;
            border-left: 4px solid #3dba75; border-radius: .6rem;
            margin-bottom: 1.5rem; font-size: .9rem;
            display: flex; align-items: center; gap: .7rem;
        }

        /* ── Footer ── */
        footer {
            background: var(--footer-bg);
            border-top: 1px solid rgba(201,168,76,.2);
            color: var(--footer-text);
            padding: 3rem 2rem 2rem;
        }
        .footer-inner { max-width: 1280px; margin: auto; }
        .footer-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem; color: var(--gold-light);
        }
        .footer-tagline { font-size: .85rem; margin-top: .3rem; }
        .footer-divider { border-color: rgba(201,168,76,.15); margin: 1.5rem 0; }
        .footer-copy { font-size: .8rem; text-align: center; }

        /* ── Inputs ── */
        .field-label {
            display: block; font-size: .8rem; font-weight: 600;
            color: var(--warm-gray); text-transform: uppercase;
            letter-spacing: .08em; margin-bottom: .5rem;
        }
        .field-input {
            width: 100%; background: var(--input-bg);
            border: 1.5px solid var(--border-light);
            border-radius: .75rem; padding: .75rem 1rem;
            font-family: 'Inter', sans-serif; font-size: .95rem;
            color: var(--charcoal); outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        .field-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,168,76,.12);
        }
        .field-input::placeholder { color: #b8afa3; }
        .field-error { color: #c0392b; font-size: .78rem; margin-top: .3rem; }

        /* ── Card ── */
        .card {
            background: var(--card-bg); border-radius: 1.1rem;
            border: 1px solid var(--border-light);
            overflow: hidden;
            transition: transform .25s, box-shadow .25s;
            display: flex; flex-direction: column;
        }
        .card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(26,18,9,.1); }
        .card-img { width: 100%; height: 220px; object-fit: cover; display: block; }
        .card-body { padding: 1.4rem 1.6rem; flex: 1; display: flex; flex-direction: column; }
        .card-category {
            font-size: .72rem; font-weight: 600; letter-spacing: .1em;
            text-transform: uppercase; color: var(--gold-dark);
            margin-bottom: .5rem;
        }
        .card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.35rem; font-weight: 600; color: var(--ink);
            line-height: 1.3; margin-bottom: .5rem;
        }
        .card-excerpt { font-size: .875rem; color: var(--warm-gray); line-height: 1.6; flex: 1; }
        .card-footer {
            display: flex; align-items: center; justify-content: space-between;
            margin-top: 1.2rem; padding-top: .9rem;
            border-top: 1px solid #f0e8da;
        }
        .card-meta { font-size: .78rem; color: #a39585; display: flex; align-items: center; gap: .35rem; }
        .like-btn {
            background: none; border: none; cursor: pointer;
            display: flex; align-items: center; gap: .3rem;
            font-size: .78rem; color: #a39585;
            padding: .3rem .5rem; border-radius: .4rem;
            transition: color .2s, background .2s;
        }
        .like-btn:hover, .like-btn.liked { color: #e05a5a; }
        .like-btn svg { width: 15px; height: 15px; }

        /* ── Tags ── */
        .tag {
            display: inline-flex; align-items: center;
            background: #f5efe3; color: var(--gold-dark);
            border-radius: 99px; padding: .18rem .65rem;
            font-size: .72rem; font-weight: 500;
        }

        /* ── Misc ── */
        .divider-ornament {
            text-align: center; color: var(--gold); font-size: 1.1rem;
            letter-spacing: .5rem; margin: .5rem 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="/" class="logo">
                <span class="logo-icon">🍽️</span>
                From My Stove To Yours
            </a>
            <div class="nav-links">
                <a href="{{ route('blogs.index') }}" class="active">Explore</a>
                <a href="#">Cuisines</a>
                <a href="#">About</a>
                <a href="{{ route('blogs.create') }}" class="btn-gold" style="padding:.5rem 1.2rem;font-size:.82rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Write a Story
                </a>
                <button id="themeToggle" style="background:none; border:none; cursor:pointer; font-size:1.2rem; color:#c8bfaf;" title="Toggle Theme">
                    🌙
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main">
        @if(session('success'))
            <div class="toast">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-inner">
            <div class="footer-brand">🍽️ From My Stove To Yours</div>
            <div class="footer-tagline">A celebration of world cuisines — stories, recipes, and the joy of cooking.</div>
            <hr class="footer-divider">
            <div class="footer-copy">&copy; {{ date('Y') }} From My Stove To Yours. All rights reserved.</div>
        </div>
    </footer>

    <script>
        // Theme toggle logic
        const themeToggle = document.getElementById('themeToggle');
        const root = document.documentElement;
        
        const savedTheme = localStorage.getItem('theme') || 'light';
        if (savedTheme === 'dark') {
            root.setAttribute('data-theme', 'dark');
            themeToggle.textContent = '☀️';
        }

        themeToggle.addEventListener('click', () => {
            const currentTheme = root.getAttribute('data-theme');
            if (currentTheme === 'dark') {
                root.removeAttribute('data-theme');
                localStorage.setItem('theme', 'light');
                themeToggle.textContent = '🌙';
            } else {
                root.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
                themeToggle.textContent = '☀️';
            }
        });

        // Global CSRF setup for fetch
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    </script>
</body>
</html>
