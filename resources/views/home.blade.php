<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kayla's Korner — Honest Reviews. Helpful Finds.</title>
    <meta name="description" content="Kayla's Korner: honest product reviews and helpful finds for home, tech, pets and everyday living.">

    <link rel="icon" href="/favicon.ico" sizes="32x32">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#fbf5ec">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Kayla's Korner — Honest Reviews. Helpful Finds.">
    <meta property="og:description" content="Honest product reviews and helpful finds for home, tech, pets and everyday living.">
    <meta property="og:image" content="{{ asset('assets/brand/icon-512.png') }}">

    <script>
        (function (d) {
            d.classList.add('is-loading');
            // Light is the default; only switch if the visitor chose dark before.
            try { if (localStorage.getItem('kk-theme') === 'dark') d.setAttribute('data-theme', 'dark'); } catch (e) {}
            if (d.getAttribute('data-theme') === 'dark') document.querySelector('meta[name=theme-color]').setAttribute('content', '#1a1713');
        })(document.documentElement);
    </script>
    <noscript><style>.preloader { display: none !important; }</style></noscript>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;1,9..144,400&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #fbf5ec;
            --cream-deep: #f3e8d6;
            --peach: #f6cfab;
            --peach-soft: #fbe4cf;
            --olive: #a8955a;
            --olive-deep: #7d6d3c;
            --sage: #6e8b3d;
            --wood: #b98a5e;
            --ink: #2e2a24;
            --ink-soft: #5d554a;
            --white: #fffdf9;
            --radius: 22px;
            --shadow: 0 18px 40px -18px rgba(70, 50, 25, .35);
            --serif: 'Fraunces', Georgia, serif;
            --sans: 'DM Sans', system-ui, -apple-system, sans-serif;

            /* Role colours (things that must not simply invert) */
            --header-bg: rgba(251, 245, 236, .68);
            --btn-hover: #443d33;
            --band-bg: var(--olive);
            --on-band: #fffdf9;
            --band-eyebrow: #fbe4cf;
            --footer-bg: #2e2a24;
            --footer-fg: #fbf5ec;
            --blob-opacity: .7;
            color-scheme: light;
        }

        /* Dark theme: warm espresso, same personality */
        :root[data-theme="dark"] {
            --cream: #1a1713;
            --cream-deep: #2e2822;
            --peach: #e9b98f;
            --peach-soft: #33271e;
            --olive: #b5a167;
            --olive-deep: #d3bf83;
            --sage: #7f9c4c;
            --ink: #f2eadf;
            --ink-soft: #b9ad9d;
            --white: #231f1a;
            --shadow: 0 18px 40px -18px rgba(0, 0, 0, .7);

            --header-bg: rgba(26, 23, 19, .66);
            --btn-hover: #ffffff;
            --band-bg: #3b3420;
            --on-band: #f6efe3;
            --band-eyebrow: #e9cfa9;
            --footer-bg: #110f0c;
            --footer-fg: #efe6d9;
            --blob-opacity: .12;
            color-scheme: dark;
        }

        /* ---------- Theme toggle ---------- */
        .nav-links { margin-left: auto; }
        .nav-tools { display: flex; align-items: center; gap: 6px; margin-left: 28px; }
        ::view-transition-old(root), ::view-transition-new(root) { animation-duration: .45s; }
        .theme-toggle {
            position: relative; width: 42px; height: 42px; border-radius: 50%;
            border: 1.5px solid var(--cream-deep); background: var(--white); color: var(--ink);
            display: grid; place-items: center; cursor: pointer;
            transition: border-color .3s ease, transform .3s ease, background .3s ease;
        }
        .theme-toggle:hover { border-color: var(--olive); transform: rotate(-12deg); }
        .theme-toggle:focus-visible { outline: 2px solid var(--olive); outline-offset: 3px; }
        .theme-toggle svg {
            position: absolute; width: 20px; height: 20px;
            transition: transform .5s cubic-bezier(.34,1.56,.64,1), opacity .3s ease;
        }
        .theme-toggle .i-sun { opacity: 0; transform: rotate(-90deg) scale(.4); }
        [data-theme="dark"] .theme-toggle .i-sun { opacity: 1; transform: none; }
        [data-theme="dark"] .theme-toggle .i-moon { opacity: 0; transform: rotate(90deg) scale(.4); }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        /* Smooth scrolling for in-page links; offset for the sticky header */
        html { scroll-behavior: smooth; scroll-padding-top: 84px; overflow-x: clip; }

        body {
            font-family: var(--sans);
            color: var(--ink);
            background: var(--cream);
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
            /* clip (not hidden) so the body doesn't become a scroll box, which would break the sticky header */
            overflow-x: clip;
        }

        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }

        .container { width: min(1160px, 100% - 32px); margin-inline: auto; }

        h1, h2, h3 { font-family: var(--serif); font-weight: 600; line-height: 1.15; letter-spacing: -.01em; }

        .eyebrow {
            display: inline-block;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--olive-deep);
            margin-bottom: 14px;
        }

        .btn {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 15px 28px;
            border-radius: 999px;
            font-weight: 700;
            font-size: .98rem;
            transition: transform .25s ease, background .25s ease, box-shadow .25s ease;
        }
        .btn-primary { background: var(--ink); color: var(--cream); box-shadow: var(--shadow); }
        .btn-primary:hover { transform: translateY(-2px); background: var(--btn-hover); }
        .btn-ghost { border: 1.5px solid var(--ink); }
        .btn-ghost:hover { background: var(--ink); color: var(--cream); }
        .btn svg { width: 18px; height: 18px; transition: transform .25s ease; }
        .btn:hover svg { transform: translateX(3px); }

        /* ---------- Header ---------- */
        .site-header {
            position: sticky; top: 0; z-index: 50;
            background: var(--header-bg);
            backdrop-filter: saturate(160%) blur(16px);
            -webkit-backdrop-filter: saturate(160%) blur(16px);
            border-bottom: 1px solid transparent;
            transition: border-color .3s ease, box-shadow .3s ease;
        }
        .site-header.scrolled { border-color: var(--cream-deep); box-shadow: 0 6px 24px -18px rgba(0,0,0,.4); }
        .nav { display: flex; align-items: center; justify-content: space-between; height: 72px; }
        .logo { font-family: var(--serif); font-size: 1.45rem; font-weight: 600; display: flex; align-items: center; gap: 10px; }
        .logo-mark { width: 38px; height: 38px; flex: none; display: block; transition: transform .35s ease; }
        .logo:hover .logo-mark { transform: rotate(-6deg) scale(1.05); }

        /* ---------- Preloader ---------- */
        html.is-loading { overflow: hidden; }
        .preloader {
            position: fixed; inset: 0; z-index: 100;
            display: grid; place-items: center;
            background: var(--cream);
            transition: opacity .6s ease, visibility .6s ease;
        }
        .preloader::before {
            content: ''; position: absolute; width: 520px; height: 520px; border-radius: 50%;
            background: radial-gradient(circle, var(--peach-soft) 0%, transparent 68%);
            animation: pl-breathe 2.4s ease-in-out infinite;
        }
        .preloader.done { opacity: 0; visibility: hidden; }
        .preloader.done .pl-inner { transform: translateY(-14px) scale(.97); }
        .pl-inner {
            position: relative; display: flex; flex-direction: column; align-items: center;
            transition: transform .6s ease;
        }
        .pl-mark { width: 96px; height: 96px; overflow: visible; }
        .pl-tile { transform-origin: 32px 32px; animation: pl-pop .6s cubic-bezier(.34,1.56,.64,1) both; }
        .pl-draw { stroke-dasharray: 1; stroke-dashoffset: 1; animation: pl-draw .45s cubic-bezier(.65,0,.35,1) forwards; }
        .pl-stem { animation-delay: .35s; }
        .pl-arm { animation-delay: .62s; }
        .pl-leg { animation-delay: .82s; }
        .pl-corner { animation-delay: 1.05s; animation-duration: .5s; }
        .pl-word {
            margin-top: 22px; font-family: var(--serif); font-weight: 600; font-size: 1.7rem; letter-spacing: -.01em;
            animation: pl-rise .6s ease .9s both;
        }
        .pl-tag {
            margin-top: 4px; font-size: .74rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase;
            color: var(--olive-deep); animation: pl-rise .6s ease 1.05s both;
        }
        .pl-bar {
            margin-top: 26px; width: 140px; height: 3px; border-radius: 3px;
            background: var(--cream-deep); overflow: hidden; animation: pl-rise .6s ease 1.1s both;
        }
        .pl-bar span {
            display: block; height: 100%; width: 100%; border-radius: inherit; background: var(--olive);
            transform: scaleX(var(--progress, .08)); transform-origin: left; transition: transform .4s ease;
        }
        @keyframes pl-pop { from { transform: scale(.4) rotate(-12deg); opacity: 0; } to { transform: none; opacity: 1; } }
        @keyframes pl-draw { to { stroke-dashoffset: 0; } }
        @keyframes pl-rise { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: none; } }
        @keyframes pl-breathe { 0%, 100% { transform: scale(.92); opacity: .8; } 50% { transform: scale(1.06); opacity: 1; } }
        .nav-links { display: flex; gap: 34px; list-style: none; font-weight: 500; font-size: .95rem; }
        .nav-links a { position: relative; padding: 4px 0; }
        .nav-links a::after {
            content: ''; position: absolute; left: 0; bottom: -2px; height: 2px; width: 100%;
            background: var(--olive); transform: scaleX(0); transform-origin: left; transition: transform .3s ease;
        }
        .nav-links a:hover::after, .nav-links a.active::after { transform: scaleX(1); }
        .menu-toggle { display: none; background: none; border: 0; cursor: pointer; padding: 8px; color: var(--ink); }
        .menu-toggle svg { width: 26px; height: 26px; }

        /* ---------- Hero ---------- */
        .hero { padding: 72px 0 96px; position: relative; }
        .hero::before {
            content: ''; position: absolute; right: -180px; top: -120px;
            width: 620px; height: 620px; border-radius: 50%;
            background: radial-gradient(circle, var(--peach-soft) 0%, transparent 70%);
            z-index: -1;
        }
        .hero-grid { display: grid; grid-template-columns: 1.05fr 1fr; gap: 64px; align-items: center; }
        .hero h1 { font-size: clamp(2.6rem, 5.4vw, 4.4rem); margin-bottom: 22px; }
        .hero h1 em { font-style: italic; font-weight: 400; color: var(--olive-deep); }
        .hero .tagline { font-size: 1.15rem; font-weight: 500; color: var(--ink-soft); margin-bottom: 18px; }
        .hero p.lead { color: var(--ink-soft); max-width: 520px; margin-bottom: 34px; }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 14px; }

        .collage { display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 16px; aspect-ratio: 1 / 1; }
        .collage figure { border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow); }
        .collage img { width: 100%; height: 100%; object-fit: cover; transition: transform .8s ease; }
        .collage figure:hover img { transform: scale(1.05); }
        .collage .tall { grid-row: span 2; border-radius: 200px 200px var(--radius) var(--radius); }
        .hero-badge {
            position: absolute; left: -26px; bottom: 34px;
            background: var(--white); border-radius: 18px; padding: 14px 18px;
            box-shadow: var(--shadow); display: flex; gap: 12px; align-items: center;
            font-size: .9rem; font-weight: 500;
        }
        .hero-badge span.dot { width: 36px; height: 36px; border-radius: 50%; background: var(--sage); color: #fff; display: grid; place-items: center; }
        .collage-wrap { position: relative; }

        /* ---------- Why ---------- */
        .why { background: var(--white); padding: 110px 0; }
        .why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 72px; align-items: center; }
        .why-img { position: relative; }
        .why-img img { border-radius: var(--radius); box-shadow: var(--shadow); }
        .why-img::after {
            content: ''; position: absolute; inset: 24px -24px -24px 24px;
            border: 2px solid var(--peach); border-radius: var(--radius); z-index: -1;
        }
        .why-img { z-index: 0; isolation: isolate; }
        .why h2 { font-size: clamp(2rem, 3.6vw, 2.9rem); margin-bottom: 22px; }
        .why p { color: var(--ink-soft); margin-bottom: 18px; }
        .goal {
            margin-top: 28px; padding: 24px 28px; border-left: 4px solid var(--olive);
            background: var(--cream); border-radius: 0 16px 16px 0;
            font-family: var(--serif); font-size: 1.2rem; font-style: italic; color: var(--ink);
        }

        /* ---------- Categories ---------- */
        .explore { padding: 110px 0; }
        .section-head { text-align: center; max-width: 620px; margin: 0 auto 56px; }
        .section-head h2 { font-size: clamp(2rem, 3.6vw, 2.9rem); margin-bottom: 14px; }
        .section-head p { color: var(--ink-soft); }
        .cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; }
        .card {
            background: var(--white); border-radius: var(--radius); overflow: hidden;
            box-shadow: 0 2px 0 var(--cream-deep);
            display: flex; flex-direction: column;
            transition: transform .35s ease, box-shadow .35s ease;
        }
        .card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
        .card-img { aspect-ratio: 4 / 3.4; overflow: hidden; }
        .card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .7s ease; }
        .card:hover .card-img img { transform: scale(1.06); }
        .card-body { padding: 24px 22px 26px; display: flex; flex-direction: column; flex: 1; }
        .card-num { font-size: .78rem; font-weight: 700; letter-spacing: .14em; color: var(--olive-deep); margin-bottom: 8px; }
        .card h3 { font-size: 1.3rem; margin-bottom: 10px; }
        .card p { color: var(--ink-soft); font-size: .95rem; }

        /* ---------- Promise ---------- */
        .promise { padding: 110px 0; background: var(--band-bg); color: var(--on-band); position: relative; overflow: hidden; }
        .promise::before, .promise::after {
            content: ''; position: absolute; width: 240px; height: 240px; opacity: .25;
            background-image:
                linear-gradient(var(--on-band) 1px, transparent 1px),
                linear-gradient(90deg, var(--on-band) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .promise::before { top: 30px; right: 30px; }
        .promise::after { bottom: 30px; left: 30px; }
        .promise-grid { display: grid; grid-template-columns: 1fr 1.25fr; gap: 72px; align-items: center; position: relative; z-index: 1; }
        .promise .eyebrow { color: var(--band-eyebrow); }
        .promise h2 { font-size: clamp(2rem, 3.6vw, 2.9rem); margin-bottom: 18px; }
        .promise-intro { opacity: .92; margin-bottom: 30px; }
        .arch { border-radius: 260px 260px var(--radius) var(--radius); overflow: hidden; box-shadow: 0 24px 50px -20px rgba(0,0,0,.45); max-width: 420px; }
        .arch img { width: 100%; aspect-ratio: 4 / 5; object-fit: cover; }
        .promises { list-style: none; display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .promises li {
            background: rgba(255,253,249,.12); border: 1px solid rgba(255,253,249,.22);
            border-radius: 18px; padding: 22px; display: flex; gap: 14px; align-items: flex-start;
            transition: background .3s ease;
        }
        .promises li:hover { background: rgba(255,253,249,.2); }
        .check { flex: none; width: 30px; height: 30px; border-radius: 50%; background: var(--on-band); color: #7d6d3c; display: grid; place-items: center; }
        .check svg { width: 16px; height: 16px; }
        .promise-note { margin-top: 28px; opacity: .92; }

        /* ---------- CTA ---------- */
        .cta { padding: 120px 0; }
        .cta-box {
            background: var(--peach-soft); border-radius: 36px; padding: 72px 56px;
            display: grid; grid-template-columns: 1.3fr 1fr; gap: 56px; align-items: center;
            position: relative; overflow: hidden;
        }
        .cta-box::before {
            content: ''; position: absolute; width: 380px; height: 380px; border-radius: 50%;
            background: var(--peach); right: -120px; top: -140px; opacity: var(--blob-opacity);
        }
        .cta-box > * { position: relative; }
        .cta h2 { font-size: clamp(2rem, 3.8vw, 3rem); margin-bottom: 18px; }
        .cta p { color: var(--ink-soft); margin-bottom: 14px; }
        .signature { font-family: var(--serif); font-style: italic; font-size: 1.6rem; margin: 22px 0 28px; color: var(--olive-deep); }
        .cta-img { border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow); transform: rotate(2deg); }
        .cta-img img { width: 100%; aspect-ratio: 1; object-fit: cover; }

        /* ---------- Contact ---------- */
        .contact { padding: 110px 0; background: var(--white); }
        .contact-form {
            max-width: 760px; margin-inline: auto; padding: clamp(24px, 5vw, 48px);
            background: var(--cream); border-radius: var(--radius); box-shadow: var(--shadow);
            display: grid; gap: 20px;
        }
        .contact-fields { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .contact-field { display: grid; gap: 8px; }
        .contact-field-full { grid-column: 1 / -1; }
        .contact-field label { font-weight: 700; font-size: .92rem; }
        .contact-field input, .contact-field textarea {
            width: 100%; padding: 13px 15px; border: 1px solid var(--cream-deep);
            border-radius: 12px; background: var(--white); color: var(--ink);
            font: inherit; transition: border-color .2s ease, box-shadow .2s ease;
        }
        .contact-field textarea { min-height: 170px; resize: vertical; }
        .contact-field input:focus, .contact-field textarea:focus {
            outline: none; border-color: var(--olive); box-shadow: 0 0 0 3px color-mix(in srgb, var(--olive) 22%, transparent);
        }
        .contact-field input[aria-invalid="true"], .contact-field textarea[aria-invalid="true"] { border-color: #b5473c; }
        .field-error { color: #b5473c; font-size: .88rem; }
        .contact-submit { justify-self: start; border: 0; cursor: pointer; font-family: inherit; }
        .contact-submit:disabled { opacity: .7; cursor: wait; }
        .contact-noscript { max-width: 760px; margin: 0 auto 20px; color: var(--ink-soft); }
        [x-cloak] { display: none !important; }
        .contact-toast {
            position: fixed; right: 20px; bottom: 20px; z-index: 90; width: min(390px, calc(100% - 40px));
            display: flex; align-items: flex-start; gap: 16px; padding: 18px 20px;
            border: 1px solid var(--olive); border-radius: 16px; background: var(--white);
            color: var(--ink); box-shadow: var(--shadow);
        }
        .contact-toast-error { border-color: #b5473c; }
        .contact-toast-close { margin-left: auto; border: 0; background: none; color: var(--ink-soft); font: inherit; font-size: 1.4rem; line-height: 1; cursor: pointer; }
        .contact-toast-close:focus-visible { outline: 2px solid var(--olive); outline-offset: 3px; }

        /* ---------- Footer ---------- */
        footer { background: var(--footer-bg); color: var(--footer-fg); padding: 56px 0 36px; }
        .foot { display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 24px; }
        .foot-motto { font-family: var(--serif); font-size: 1.25rem; font-style: italic; color: var(--peach); }
        .cta-actions { display: flex; flex-wrap: wrap; gap: 12px; }
        .btn-call .phone-ico { width: 17px; height: 17px; }
        .btn-call:hover svg { transform: none; }
        .foot-mid { display: flex; flex-direction: column; align-items: center; gap: 8px; }
        .foot-phone { display: inline-flex; align-items: center; gap: 8px; font-weight: 500; letter-spacing: .02em; opacity: .9; transition: color .25s ease; }
        .foot-phone:hover { color: var(--peach); opacity: 1; }
        .foot-phone svg { width: 16px; height: 16px; }
        .foot-links { display: flex; gap: 22px; list-style: none; font-size: .92rem; opacity: .8; }
        .foot-links a:hover { opacity: 1; color: var(--peach); }
        .copy { margin-top: 36px; padding-top: 22px; border-top: 1px solid rgba(251,245,236,.12); font-size: .85rem; opacity: .6; text-align: center; }

        /* ---------- Fade-in on scroll ---------- */
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .8s cubic-bezier(.2,.65,.3,1), transform .8s cubic-bezier(.2,.65,.3,1);
            transition-delay: var(--delay, 0s);
            will-change: opacity, transform;
        }
        .reveal.from-left { transform: translateX(-36px); }
        .reveal.from-right { transform: translateX(36px); }
        .reveal.zoom { transform: scale(.94); }
        .reveal.is-visible { opacity: 1; transform: none; }
        /* Fade out together, without the staggered fade-in delay */
        .reveal:not(.is-visible) { transition-delay: 0s; }

        /* No-JS fallback: show everything */
        .no-js .reveal { opacity: 1; transform: none; }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            .reveal { opacity: 1; transform: none; transition: none; }
            *, *::before, *::after { transition-duration: .01ms !important; }
            .preloader *, .preloader::before { animation: none !important; }
            .pl-draw { stroke-dashoffset: 0; }
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 1024px) {
            .cards { grid-template-columns: repeat(2, 1fr); }
            .hero-grid, .why-grid, .promise-grid { gap: 48px; }
        }
        @media (max-width: 860px) {
            .menu-toggle { display: block; }
            .nav-links {
                position: absolute; top: 72px; left: 0; right: 0;
                flex-direction: column; gap: 0; background: var(--cream);
                border-bottom: 1px solid var(--cream-deep);
                max-height: 0; overflow: hidden; transition: max-height .4s ease;
            }
            .nav-links.open { max-height: 320px; }
            .nav-links li a { display: block; padding: 16px; }
            .nav-links a::after { display: none; }
            .hero { padding: 40px 0 72px; }
            .hero-grid, .why-grid, .promise-grid, .cta-box { grid-template-columns: 1fr; }
            .hero-grid { gap: 56px; }
            .collage-wrap { width: 100%; max-width: 540px; margin-inline: auto; }
            .why-grid, .promise-grid { gap: 40px; }
            .hero-badge { left: 12px; bottom: -18px; }
            .why-img { max-width: 520px; }
            .why-img::after { inset: 12px -8px -12px 8px; }
            .arch { width: min(340px, 100%); margin-inline: auto; }
            .arch img { aspect-ratio: 1 / 1; }
            .promise::before, .promise::after { width: 140px; height: 140px; opacity: .15; }
            .promise::before { top: 16px; right: 16px; }
            .promise::after { display: none; }
            .cta-box { padding: 48px 28px; gap: 40px; }
            .cta-img { max-width: 320px; width: 100%; margin-inline: auto; transform: rotate(1.5deg); }
            .why, .explore, .promise, .cta { padding: 72px 0; }
            .contact { padding: 72px 0; }
            .section-head { margin-bottom: 40px; }
        }
        @media (max-width: 560px) {
            html { scroll-padding-top: 76px; }
            .nav { height: 64px; }
            .nav-links { top: 64px; }
            .logo { font-size: 1.25rem; }
            .logo-mark { width: 34px; height: 34px; }
            .hero h1 { font-size: clamp(2.05rem, 9.6vw, 2.6rem); }
            .hero .tagline { font-size: 1.05rem; }
            .hero-actions { flex-direction: column; }
            .hero-actions .btn { justify-content: center; width: 100%; }
            .cards, .promises { grid-template-columns: 1fr; }
            .contact-fields { grid-template-columns: 1fr; }
            .contact-field-full { grid-column: auto; }
            .card-img { aspect-ratio: 16 / 11; }
            .collage { gap: 10px; }
            .collage .tall { border-radius: 140px 140px 18px 18px; }
            .hero-badge { font-size: .85rem; padding: 10px 14px; }
            .hero-badge span.dot { width: 30px; height: 30px; }
            .goal { padding: 20px 20px; font-size: 1.08rem; }
            .promises li { padding: 18px; }
            .cta { padding: 56px 0 72px; }
            .cta-box { padding: 40px 22px; border-radius: 28px; }
            .cta-box::before { width: 240px; height: 240px; right: -90px; top: -90px; }
            .cta-actions { flex-direction: column; }
            .cta .btn { width: 100%; justify-content: center; }
            .foot { flex-direction: column; text-align: center; }
            .foot-links { justify-content: center; }
        }
    </style>
</head>
<body class="no-js">

    {{-- Brand mark, reused by the header and footer --}}
    <svg width="0" height="0" style="position:absolute" aria-hidden="true">
        <symbol id="kk-mark" viewBox="0 0 64 64">
            <path fill="#F6CFAB" d="M14 0H50A14 14 0 0 1 64 14V50A14 14 0 0 1 50 64H3A3 3 0 0 1 0 61V14A14 14 0 0 1 14 0Z"/>
            <path fill="none" stroke="#A8955A" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" d="M9 41V55H23"/>
            <g fill="none" stroke="#2E2A24" stroke-width="6.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M23 16V47"/><path d="M43 16L26.5 32.5"/><path d="M31 28.5L45 47"/>
            </g>
        </symbol>
    </svg>

    <div class="preloader" role="status" aria-label="Loading Kayla's Korner">
        <div class="pl-inner">
            <svg class="pl-mark" viewBox="0 0 64 64" aria-hidden="true">
                <path class="pl-tile" fill="#F6CFAB" d="M14 0H50A14 14 0 0 1 64 14V50A14 14 0 0 1 50 64H3A3 3 0 0 1 0 61V14A14 14 0 0 1 14 0Z"/>
                <path class="pl-draw pl-corner" pathLength="1" fill="none" stroke="#A8955A" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" d="M9 41V55H23"/>
                <g fill="none" stroke="#2E2A24" stroke-width="6.5" stroke-linecap="round" stroke-linejoin="round">
                    <path class="pl-draw pl-stem" pathLength="1" d="M23 16V47"/>
                    <path class="pl-draw pl-arm" pathLength="1" d="M43 16L26.5 32.5"/>
                    <path class="pl-draw pl-leg" pathLength="1" d="M31 28.5L45 47"/>
                </g>
            </svg>
            <div class="pl-word">Kayla's Korner</div>
            <div class="pl-tag">Honest Reviews. Helpful Finds.</div>
            <div class="pl-bar"><span></span></div>
        </div>
    </div>

    <header class="site-header" id="top">
        <nav class="container nav" aria-label="Main">
            <a href="#top" class="logo"><svg class="logo-mark" aria-hidden="true"><use href="#kk-mark"/></svg> Kayla's Korner</a>
            <ul class="nav-links" id="nav-links">
                <li><a href="#why">About</a></li>
                <li><a href="#explore">Explore</a></li>
                <li><a href="#promise">My Promise</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="nav-tools">
                <button class="theme-toggle" type="button" aria-label="Switch to dark mode" aria-pressed="false">
                    <svg class="i-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.5 14.2A8.5 8.5 0 0 1 9.8 3.5 8.5 8.5 0 1 0 20.5 14.2Z"/></svg>
                    <svg class="i-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="4.2"/><path d="M12 2.5v2M12 19.5v2M4.6 4.6l1.4 1.4M18 18l1.4 1.4M2.5 12h2M19.5 12h2M4.6 19.4 6 18M18 6l1.4-1.4"/></svg>
                </button>
                <button class="menu-toggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="nav-links">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                </button>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero -->
        <section class="hero">
            <div class="container hero-grid">
                <div>
                    <span class="eyebrow reveal">Welcome to my little corner of the internet</span>
                    <h1 class="reveal" style="--delay:.1s">Honest Reviews.<br>Helpful Finds.<br><em>Everyday Living.</em></h1>
                    <p class="tagline reveal" style="--delay:.2s">Products actually worth your hard-earned money.</p>
                    <p class="lead reveal" style="--delay:.3s">Finding products that are actually worth your hard-earned money shouldn't be difficult. Kayla's Korner is a place to discover useful products, read honest opinions, and find everyday essentials that make life a little easier.</p>
                    <div class="hero-actions reveal" style="--delay:.4s">
                        <a href="#explore" class="btn btn-primary">Explore the Korner
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </a>
                        <a href="#why" class="btn btn-ghost">Why Kayla's Korner?</a>
                    </div>
                </div>

                <div class="collage-wrap reveal zoom" style="--delay:.2s">
                    <div class="collage">
                        <figure class="tall"><img src="{{ asset('assets/images/1.webp') }}" alt="Two happy golden retriever puppies sitting in the grass"></figure>
                        <figure><img src="{{ asset('assets/images/Electronics.webp') }}" alt="Phone with a wireless charger, case and earbuds on a wooden desk"></figure>
                        <figure><img src="{{ asset('assets/images/2.webp') }}" alt="Bright modern kitchen with wooden cabinets and a white island"></figure>
                    </div>
                    <div class="hero-badge">
                        <span class="dot">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>
                        </span>
                        Honest picks, real value
                    </div>
                </div>
            </div>
        </section>

        <!-- Why -->
        <section class="why" id="why">
            <div class="container why-grid">
                <div class="why-img reveal from-left">
                    <img src="{{ asset('assets/images/4.webp') }}" alt="Gloved hand wiping a clean white countertop" loading="lazy">
                </div>
                <div>
                    <span class="eyebrow reveal">Why Kayla's Korner?</span>
                    <h2 class="reveal" style="--delay:.1s">Because your money deserves better than empty promises.</h2>
                    <p class="reveal" style="--delay:.2s">I started this page because I was tired of seeing people spend their money on products that didn't live up to their promises. I believe shopping should be about finding quality, convenience, and value—not just following trends or buying something because it looks good.</p>
                    <p class="reveal" style="--delay:.25s">Whether you're shopping for your home, upgrading your phone accessories, or looking for something special for your furry family members, I'm here to help you find products that offer real value.</p>
                    <div class="goal reveal" style="--delay:.35s">"My goal is simple: share helpful product recommendations and honest insights so you can shop with greater confidence."</div>
                </div>
            </div>
        </section>

        <!-- Explore -->
        <section class="explore" id="explore">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow reveal">Explore the Korner</span>
                    <h2 class="reveal" style="--delay:.1s">Something for every corner of your life</h2>
                    <p class="reveal" style="--delay:.2s">Four little corners, each filled with finds chosen for everyday value.</p>
                </div>

                <div class="cards">
                    <article class="card reveal" style="--delay:0s">
                        <div class="card-img"><img src="{{ asset('assets/images/2.webp') }}" alt="Modern kitchen interior" loading="lazy"></div>
                        <div class="card-body">
                            <span class="card-num">01</span>
                            <h3>Home &amp; Household Essentials</h3>
                            <p>Practical household products, organization ideas, and everyday essentials that help make your home more comfortable and functional.</p>
                        </div>
                    </article>
                    <article class="card reveal" style="--delay:.12s">
                        <div class="card-img"><img src="{{ asset('assets/images/Electronics.webp') }}" alt="Phone accessories on a desk" loading="lazy"></div>
                        <div class="card-body">
                            <span class="card-num">02</span>
                            <h3>Phone &amp; Technology Accessories</h3>
                            <p>Useful phone accessories, gadgets, and tech finds designed to make your everyday digital life easier.</p>
                        </div>
                    </article>
                    <article class="card reveal" style="--delay:.24s">
                        <div class="card-img"><img src="{{ asset('assets/images/1.webp') }}" alt="Golden retriever puppies" loading="lazy"></div>
                        <div class="card-body">
                            <span class="card-num">03</span>
                            <h3>Pet Products &amp; Accessories</h3>
                            <p>Our pets deserve the best, too! Fun, practical, and helpful products for your four-legged family members.</p>
                        </div>
                    </article>
                    <article class="card reveal" style="--delay:.36s">
                        <div class="card-img"><img src="{{ asset('assets/images/3.webp') }}" alt="Rose-gold beauty products on a tray" loading="lazy"></div>
                        <div class="card-body">
                            <span class="card-num">04</span>
                            <h3>Everyday Finds</h3>
                            <p>From convenient lifestyle accessories to interesting products you didn't know you needed—little finds that make a big difference.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Promise -->
        <section class="promise" id="promise">
            <div class="container promise-grid">
                <div class="arch reveal from-left">
                    <img src="{{ asset('assets/images/5.webp') }}" alt="Vitamin bottle on a wooden slice with green ivy" loading="lazy">
                </div>
                <div>
                    <span class="eyebrow reveal">My Promise to You</span>
                    <h2 class="reveal" style="--delay:.1s">Keeping things simple.</h2>
                    <p class="promise-intro reveal" style="--delay:.15s">At Kayla's Korner, I believe in keeping things simple:</p>
                    <ul class="promises">
                        @foreach ([
                            'Honest opinions and helpful recommendations.',
                            'Products selected with everyday value in mind.',
                            'Useful finds that make life easier.',
                            'Helping shoppers make informed purchasing decisions.',
                        ] as $i => $promise)
                            <li class="reveal" style="--delay:{{ 0.2 + $i * 0.1 }}s">
                                <span class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg></span>
                                <span>{{ $promise }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p class="promise-note reveal" style="--delay:.6s">I want this to be a place where you feel comfortable exploring, discovering, and finding products that are right for you.</p>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="cta" id="shop">
            <div class="container">
                <div class="cta-box reveal zoom">
                    <div>
                        <span class="eyebrow">Let's Find Something Worth Loving!</span>
                        <h2>Your next favorite find might be just around the corner.</h2>
                        <p>Thank you for visiting Kayla's Korner and supporting this growing community. Every visit, recommendation, and purchase helps this little corner continue to grow.</p>
                        <p><strong>Happy Shopping!</strong></p>
                        <div class="signature">— Kayla</div>
                        <div class="cta-actions">
                            <a href="#explore" class="btn btn-primary">Start Exploring
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="tel:+14048447357" class="btn btn-ghost btn-call" aria-label="Call Kayla's Korner at (404) 844-7357">
                                <svg class="phone-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                                (404) 844-7357
                            </a>
                        </div>
                    </div>
                    <div class="cta-img">
                        <img src="{{ asset('assets/images/3.webp') }}" alt="Beauty products in warm peach tones" loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section class="contact" id="contact">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow reveal">Get in touch</span>
                    <h2 class="reveal" style="--delay:.1s">Say hello to Kayla</h2>
                    <p class="reveal" style="--delay:.2s">Have a question or a product recommendation? Send me a message.</p>
                </div>

                <livewire:contact-form />
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="foot">
                <a href="#top" class="logo"><svg class="logo-mark" aria-hidden="true"><use href="#kk-mark"/></svg> Kayla's Korner</a>
                <div class="foot-mid">
                    <p class="foot-motto">Explore. Discover. Shop with Confidence.</p>
                    <a href="tel:+14048447357" class="foot-phone">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                        (404) 844-7357
                    </a>
                </div>
                <ul class="foot-links">
                    <li><a href="#why">About</a></li>
                    <li><a href="#explore">Explore</a></li>
                    <li><a href="#promise">Promise</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <p class="copy">&copy; {{ date('Y') }} Kayla's Korner. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.body.classList.remove('no-js');

        // Fade-in on scroll (started once the preloader has lifted)
        function startReveal() {
            var items = document.querySelectorAll('.reveal');
            if (!('IntersectionObserver' in window)) {
                items.forEach(function (el) { el.classList.add('is-visible'); });
                return;
            }
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    // Fade in once 15% is on screen; fade out only when fully off screen,
                    // so elements near the edge don't flicker.
                    if (entry.intersectionRatio >= 0.15) {
                        entry.target.classList.add('is-visible');
                    } else if (!entry.isIntersecting) {
                        entry.target.classList.remove('is-visible');
                    }
                });
            }, { threshold: [0, 0.15], rootMargin: '0px 0px -40px 0px' });
            items.forEach(function (el) { io.observe(el); });
        }

        // Preloader
        (function () {
            var loader = document.querySelector('.preloader');
            var bar = loader.querySelector('.pl-bar span');
            var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var seen = false;
            try { seen = sessionStorage.getItem('kk-seen') === '1'; sessionStorage.setItem('kk-seen', '1'); } catch (e) {}

            // Let the logo finish drawing on the first visit; keep it brief after that.
            var minTime = reduced ? 200 : (seen ? 600 : 1700);
            var start = Date.now();
            var finished = false;

            // Progress follows the images the browser loads up front.
            var imgs = Array.prototype.filter.call(document.images, function (img) {
                return img.loading !== 'lazy';
            });
            var loaded = 0;
            function tick() {
                loaded++;
                bar.style.setProperty('--progress', Math.max(.08, Math.min(.9, loaded / (imgs.length || 1))));
            }
            imgs.forEach(function (img) {
                if (img.complete) { tick(); }
                else {
                    img.addEventListener('load', tick, { once: true });
                    img.addEventListener('error', tick, { once: true });
                }
            });

            function finish() {
                if (finished) return;
                finished = true;
                bar.style.setProperty('--progress', 1);
                setTimeout(function () {
                    loader.classList.add('done');
                    document.documentElement.classList.remove('is-loading');
                    startReveal();
                    setTimeout(function () { loader.remove(); }, 700);
                }, Math.max(0, minTime - (Date.now() - start)) + 250);
            }

            if (document.readyState === 'complete') finish();
            else window.addEventListener('load', finish);
            setTimeout(finish, 6000); // never hold the page hostage on a slow connection
        })();

        // Header shadow + active nav link
        (function () {
            var header = document.querySelector('.site-header');
            var links = document.querySelectorAll('.nav-links a');
            var sections = Array.prototype.map.call(links, function (a) {
                return document.querySelector(a.getAttribute('href'));
            });
            function onScroll() {
                header.classList.toggle('scrolled', window.scrollY > 10);
                var pos = window.scrollY + 120;
                links.forEach(function (a, i) {
                    var s = sections[i];
                    a.classList.toggle('active', !!s && s.offsetTop <= pos && s.offsetTop + s.offsetHeight > pos);
                });
            }
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        })();

        // Theme toggle (light by default, choice remembered)
        (function () {
            var root = document.documentElement;
            var btn = document.querySelector('.theme-toggle');
            var meta = document.querySelector('meta[name=theme-color]');

            function sync() {
                var dark = root.getAttribute('data-theme') === 'dark';
                btn.setAttribute('aria-pressed', dark);
                btn.setAttribute('aria-label', dark ? 'Switch to light mode' : 'Switch to dark mode');
                meta.setAttribute('content', dark ? '#1a1713' : '#fbf5ec');
            }
            function apply(theme) {
                if (theme === 'dark') root.setAttribute('data-theme', 'dark');
                else root.removeAttribute('data-theme');
                try { localStorage.setItem('kk-theme', theme); } catch (e) {}
                sync();
            }

            btn.addEventListener('click', function () {
                var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                // Smooth cross-fade where the browser supports it; instant otherwise.
                if (document.startViewTransition && !reduced) {
                    document.startViewTransition(function () { apply(next); });
                } else {
                    apply(next);
                }
            });
            sync();
        })();

        // Mobile menu
        (function () {
            var btn = document.querySelector('.menu-toggle');
            var menu = document.getElementById('nav-links');
            btn.addEventListener('click', function () {
                var open = menu.classList.toggle('open');
                btn.setAttribute('aria-expanded', open);
            });
            menu.addEventListener('click', function (e) {
                if (e.target.tagName === 'A') {
                    menu.classList.remove('open');
                    btn.setAttribute('aria-expanded', 'false');
                }
            });
        })();
    </script>
</body>
</html>
