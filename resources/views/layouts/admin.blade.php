<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin - SayaBantu.com')</title>

    {{-- Google Font Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Admin Unified Components CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin-components.css') }}">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#0E1D31',
                        navySoft: '#17314A',
                        amber: '#FBBF24',
                        page: '#F7F9FC',
                    }
                }
            }
        }
    </script>

    <style>
        /* =====================================================
           GLOBAL RESET & MOBILE FRAME
        ====================================================== */
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        html, body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #CBD5E1;
            color: #111827;
        }

        a { text-decoration: none; }
        button { font-family: inherit; cursor: pointer; }
        ::-webkit-scrollbar { width: 0; height: 0; }

        .mobile-app {
            width: 100%;
            max-width: 430px;
            min-height: 100vh;
            margin: 0 auto;
            position: relative;
            overflow-x: hidden;
            background: #F7F9FC;
            box-shadow: 0 0 50px rgba(15, 23, 42, 0.20);
            padding-bottom: 76px;
        }

        /* =====================================================
           STANDARISASI GRADIEN BLUR UNIFORM SAYABANTU
           Disamaratakan, halus tanpa garis tegas/jelas,
           fading natural ke #F7F9FC persis tampilan semula.
        ====================================================== */
        .admin-top-area,
        .pesanan-top-area,
        .pembayaran-top-area,
        .profile-top-area,
        .customer-top-area,
        .sb-admin-gradient {
            position: relative;
            overflow: visible;
            color: white;
            background:
                radial-gradient(circle at 92% 4%, rgba(255, 255, 255, 0.10), transparent 27%),
                radial-gradient(circle at 0% 42%, rgba(75, 110, 140, 0.20), transparent 32%),
                radial-gradient(circle at 100% 58%, rgba(112, 143, 164, 0.15), transparent 30%),
                linear-gradient(
                    180deg,
                    #0E1D31 0%,
                    #0E1D31 22%,
                    #11263D 36%,
                    #17334C 50%,
                    #294D65 64%,
                    #5F7C8E 76%,
                    #A7BAC6 86%,
                    #D9E3E9 94%,
                    #F7F9FC 100%
                );
            padding-bottom: 24px;
        }

        /* Dekorasi Lingkaran Header */
        .header-circle-one {
            position: absolute;
            width: 190px;
            height: 190px;
            right: -105px;
            top: -120px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.045);
            pointer-events: none;
        }

        .header-circle-two {
            position: absolute;
            width: 135px;
            height: 135px;
            left: -80px;
            top: 120px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.025);
            pointer-events: none;
        }

        /* Header Elemen */
        .header-content {
            position: relative;
            z-index: 10;
        }

        .header-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            color: rgba(255, 255, 255, 0.92);
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(8px);
            transition: all 0.18s ease;
        }

        .header-icon:hover {
            background: rgba(255, 255, 255, 0.20);
        }

        .header-icon:active {
            transform: scale(0.92);
        }

        .profile-admin {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            color: white;
            font-size: 11px;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(8px);
            transition: all 0.18s ease;
        }

        .profile-admin:hover {
            background: rgba(255, 255, 255, 0.22);
        }

        .profile-admin:active {
            transform: scale(0.92);
        }

        .notification-dot {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: #FBBF24;
            border: 2px solid #0E1D31;
            box-shadow: 0 0 8px rgba(251, 191, 36, 0.7);
        }

        /* =====================================================
           UNIFIED CONTENT WRAPPER
        ====================================================== */
        .admin-content-area {
            position: relative;
            z-index: 20;
            padding: 8px 20px 96px;
            margin-top: -32px; /* konten masuk sedikit ke ekor gradient */
        }

        /* Stat cards di dashboard */
        .stat-card {
            position: relative;
            overflow: hidden;
            padding: 11px;
            min-height: 125px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid rgba(255, 255, 255, 0.95);
            box-shadow: 0 5px 16px rgba(15, 23, 42, 0.07);
            transition: all 0.18s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.10);
        }

        .stat-card:active {
            transform: scale(0.985);
        }

        .stat-decoration {
            position: absolute;
            right: -22px;
            top: -22px;
            width: 72px;
            height: 72px;
            border-radius: 9999px;
            opacity: 0.75;
        }

        .icon-box {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .icon-blue { color: #2563EB; background: #EEF5FF; }
        .icon-green { color: #16A34A; background: #ECFDF3; }
        .icon-amber { color: #D97706; background: #FFF7DB; }
        .icon-red { color: #DC2626; background: #FEF2F2; }

        .admin-card {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 18px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.045);
        }

        .pesanan-card {
            background: #FFFFFF;
            border: 1.5px solid #CBD5E1;
            border-radius: 18px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.065);
            overflow: hidden;
            transition: all 0.18s ease;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 4px 8px;
            border-radius: 9999px;
            font-size: 8px;
            font-weight: 600;
        }

        .status-success { color: #15803D; background: #ECFDF3; }
        .status-warning { color: #B45309; background: #FFF7DB; }
        .status-danger { color: #B91C1C; background: #FEF2F2; }

        /* =====================================================
           BOTTOM NAVIGATION
        ====================================================== */
        .bottom-navigation {
            position: fixed;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 100%;
            max-width: 430px;
            z-index: 100;
            padding: 6px 10px 8px;
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-top: 1px solid #E5E7EB;
            box-shadow: 0 -5px 22px rgba(15, 23, 42, 0.055);
        }

        .bottom-navigation-inner {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 4px;
        }

        .bottom-nav-item {
            min-height: 50px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            border-radius: 15px;
            color: #9CA3AF;
            transition: all 0.18s ease;
        }

        .bottom-nav-item i { font-size: 15px; }
        .bottom-nav-item span { font-size: 9px; line-height: 1; font-weight: 500; }
        .bottom-nav-item:hover { color: #6B7280; }
        .bottom-nav-item:active { transform: scale(0.94); }

        .bottom-nav-item.nav-active {
            color: #173B67;
            background: #EFF6FF;
        }

        .bottom-nav-item.nav-active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 22px;
            height: 3px;
            border-radius: 0 0 6px 6px;
            background: #173B67;
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="mobile-app">

    {{-- 1. UNIFIED GRADIENT TOP AREA (SAMA RATA DI SEMUA HALAMAN) --}}
    <div class="admin-top-area">
        <div class="header-circle-one"></div>
        <div class="header-circle-two"></div>

        {{-- Modular Uniform Admin Header: Burger | SayaBantu.com | Bell | Avatar --}}
        @include('layouts.partials.admin-header')

        {{-- Sub-header: Tombol Kembali di bawah burger menu, Judul & Sub-judul --}}
        @php
            $backUrl = trim($__env->yieldContent('back-url'));
            $backText = trim($__env->yieldContent('back-text')) ?: 'Kembali ke Dashboard';
            $pageTitle = trim($__env->yieldContent('page-title'));
            $pageSubtitle = trim($__env->yieldContent('page-subtitle'));
        @endphp

        @if($backUrl !== '' || $pageTitle !== '')
            <div class="px-5 pt-3 pb-1 relative z-10">
                @if($backUrl !== '')
                    <a
                        href="{{ $backUrl }}"
                        class="inline-flex items-center gap-1.5 text-[10px] font-medium text-white/75 hover:text-white transition-colors mb-2"
                    >
                        <i class="fa-solid fa-arrow-left text-[9px]"></i>
                        <span>{{ $backText }}</span>
                    </a>
                @endif

                @if($pageTitle !== '')
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-[20px] font-bold tracking-tight text-white leading-tight">
                                {{ $pageTitle }}
                            </h2>
                            @if($pageSubtitle !== '')
                                <p class="text-[10px] text-white/70 mt-0.5 leading-snug">
                                    {{ $pageSubtitle }}
                                </p>
                            @endif
                        </div>
                        @yield('page-badge')
                    </div>
                @endif
            </div>
        @endif

        @yield('hero')
        @yield('page-hero')
        @yield('page-top')
    </div>

    {{-- 2. UNIFIED CONTENT AREA (SATU WRAPPER UTAMA) --}}
    <main class="admin-content-area">
        @yield('content')
    </main>

</div>

{{-- Navigasi Bawah --}}
@if(trim($__env->yieldContent('hide-bottom-nav')) !== 'true')
<nav class="bottom-navigation">
    <div class="bottom-navigation-inner">
        <a href="{{ route('admin.dashboard') }}" class="bottom-nav-item {{ request()->routeIs('admin.dashboard') ? 'nav-active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>

        <a href="{{ route('admin.pesanan') }}" class="bottom-nav-item {{ request()->routeIs('admin.pesanan*') ? 'nav-active' : '' }}">
            <i class="fa-solid fa-file-lines"></i>
            <span>Pesanan</span>
        </a>

        <a href="{{ route('admin.pembayaran') }}" class="bottom-nav-item {{ request()->routeIs('admin.pembayaran*') ? 'nav-active' : '' }}">
            <i class="fa-solid fa-credit-card"></i>
            <span>Bayar</span>
        </a>

        <a href="{{ route('admin.profile') }}" class="bottom-nav-item {{ request()->routeIs('admin.profile*') ? 'nav-active' : '' }}">
            <i class="fa-solid fa-user"></i>
            <span>Profil</span>
        </a>
    </div>
</nav>
@endif

{{-- MODALS & INTERACTIVE OVERLAYS --}}
@include('layouts.partials.admin-header-modals')

{{-- REALTIME CLIENT SCRIPT --}}
<script src="{{ asset('js/admin-realtime.js') }}"></script>

@stack('scripts')

</body>
</html>
