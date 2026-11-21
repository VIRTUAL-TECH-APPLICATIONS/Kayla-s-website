<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>@yield('title') — Kayla's Korner</title>

    <link rel="icon" href="/favicon.ico" sizes="32x32">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <meta name="theme-color" content="#fbf5ec">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,600;1,9..144,400&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #fbf5ec;
            --cream-deep: #f3e8d6;
            --peach: #f6cfab;
            --peach-soft: #fbe4cf;
            --olive: #a8955a;
            --olive-deep: #7d6d3c;
            --ink: #2e2a24;
            --ink-soft: #5d554a;
            --serif: 'Fraunces', Georgia, serif;
            --sans: 'DM Sans', system-ui, -apple-system, sans-serif;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; }
        body {
            font-family: var(--sans); color: var(--ink); background: var(--cream);
            line-height: 1.65; -webkit-font-smoothing: antialiased;
            display: flex; flex-direction: column; overflow-x: hidden;
        }
        a { color: inherit; text-decoration: none; }

        body::before {
            content: ''; position: fixed; z-index: -1; width: 640px; height: 640px; border-radius: 50%;
            left: 50%; top: 42%; transform: translate(-50%, -50%);
            background: radial-gradient(circle, var(--peach-soft) 0%, transparent 70%);
        }

        header { padding: 22px 0; }
        .container { width: min(1160px, 100% - 32px); margin-inline: auto; }
        .logo { display: inline-flex; align-items: center; gap: 10px; font-family: var(--serif); font-weight: 600; font-size: 1.35rem; }
        .logo svg { width: 36px; height: 36px; transition: transform .35s ease; }
        .logo:hover svg { transform: rotate(-6deg) scale(1.05); }

        main { flex: 1; display: grid; place-items: center; padding: 24px 0 64px; }
        .card { text-align: center; max-width: 560px; }

        .code {
            font-family: var(--serif); font-weight: 600; line-height: 1;
            font-size: clamp(5.5rem, 22vw, 9.5rem); letter-spacing: -.04em;
            color: var(--olive); position: relative; display: inline-block;
        }
        .code::after {
            content: ''; position: absolute; left: -24px; bottom: -6px; width: 34px; height: 34px;
            border-left: 5px solid var(--peach); border-bottom: 5px solid var(--peach); border-radius: 0 0 0 6px;
        }
        .eyebrow {
            display: block; margin-top: 18px; font-size: .78rem; font-weight: 700;
            letter-spacing: .16em; text-transform: uppercase; color: var(--olive-deep);
        }
        h1 { font-family: var(--serif); font-weight: 600; font-size: clamp(1.9rem, 5vw, 2.6rem); line-height: 1.15; margin: 10px 0 14px; }
        p.message { color: var(--ink-soft); font-size: 1.05rem; max-width: 460px; margin: 0 auto 32px; }

        .actions { display: flex; flex-wrap: wrap; gap: 12px; justify-content: center; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 10px;
            padding: 14px 26px; border-radius: 999px; font: 700 .97rem var(--sans);
            border: 1.5px solid var(--ink); cursor: pointer; background: none; color: var(--ink);
            transition: transform .25s ease, background .25s ease, color .25s ease;
        }
        .btn svg { width: 18px; height: 18px; }
        .btn-primary { background: var(--ink); color: var(--cream); box-shadow: 0 18px 40px -18px rgba(70,50,25,.45); }
        .btn-primary:hover { transform: translateY(-2px); background: #443d33; }
        .btn-ghost:hover { background: var(--ink); color: var(--cream); }

        .help { margin-top: 36px; font-size: .92rem; color: var(--ink-soft); }
        .help a { font-weight: 700; color: var(--ink); border-bottom: 1.5px solid var(--peach); transition: border-color .25s ease; }
        .help a:hover { border-color: var(--olive); }

        footer { padding: 22px 0; text-align: center; font-size: .85rem; color: var(--ink-soft); }

        .rise { animation: rise .7s cubic-bezier(.2,.65,.3,1) both; }
        .rise:nth-child(2) { animation-delay: .08s; }
        .rise:nth-child(3) { animation-delay: .16s; }
        .rise:nth-child(4) { animation-delay: .24s; }
        .rise:nth-child(5) { animation-delay: .32s; }
        .rise:nth-child(6) { animation-delay: .4s; }
        @keyframes rise { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }
        @media (prefers-reduced-motion: reduce) { .rise { animation: none; } * { transition: none !important; } }

        @media (max-width: 480px) {
            .actions { flex-direction: column; }
            .btn { width: 100%; }
            .code::after { width: 26px; height: 26px; border-width: 4px; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <a href="/" class="logo" aria-label="Kayla's Korner home">
                <svg viewBox="0 0 64 64" aria-hidden="true">
                    <path fill="#F6CFAB" d="M14 0H50A14 14 0 0 1 64 14V50A14 14 0 0 1 50 64H3A3 3 0 0 1 0 61V14A14 14 0 0 1 14 0Z"/>
                    <path fill="none" stroke="#A8955A" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" d="M9 41V55H23"/>
                    <g fill="none" stroke="#2E2A24" stroke-width="6.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M23 16V47"/><path d="M43 16L26.5 32.5"/><path d="M31 28.5L45 47"/>
                    </g>
                </svg>
                Kayla's Korner
            </a>
        </div>
    </header>

    <main>
        <div class="card container">
            <div class="code rise" aria-hidden="true">@yield('code')</div>
            <span class="eyebrow rise">Error @yield('code')</span>
            <h1 class="rise">@yield('heading')</h1>
            <p class="message rise">@yield('message')</p>
            <div class="actions rise">
                @hasSection('actions')
                    @yield('actions')
                @else
                    <a href="/" class="btn btn-primary">
                        Back to the Korner
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </a>
                    <button type="button" class="btn btn-ghost" onclick="history.length > 1 ? history.back() : (location.href = '/')">Go back</button>
                @endif
            </div>
            <p class="help rise">Need a hand? Call <a href="tel:+14048447357">(404) 844-7357</a></p>
        </div>
    </main>

    <footer>&copy; {{ date('Y') }} Kayla's Korner</footer>
</body>
</html>
