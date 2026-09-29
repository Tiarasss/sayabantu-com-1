<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'SayaBantu.com | Layanan Suruhan & Jasa Terpercaya')</title>
    
    <meta name="description" content="SayaBantu.com - Solusi Jasa, Tukang, dan Suruhan Terpercaya. Suruh apa aja siap melayani sepenuh hati 24 jam.">

    {{-- FONT INTER (PERSIS ADMIN) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- TAILWIND --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#0E1D31',
                        navySoft: '#17314A',
                        primary: '#173B67',
                        amber: '#FBBF24',
                        page: '#F7F9FC',
                    }
                }
            }
        }
    </script>

    <style>
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
            background: #E5E7EB;
            color: #111827;
        }

        a {
            text-decoration: none;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        ::-webkit-scrollbar {
            width: 0;
            height: 0;
        }

        /* =====================================================
           MOBILE APP FRAME (PERSIS SEPERTI HALAMAN ADMIN)
        ====================================================== */
        .mobile-app {
            width: 100%;
            max-width: 430px;
            min-height: 100vh;
            margin: 0 auto;
            position: relative;
            overflow-x: hidden;
            background: #F7F9FC;
            box-shadow: 0 0 40px rgba(15,23,42,0.14);
            padding-bottom: 92px;
        }

        /* =====================================================
           CUSTOMER TOP AREA (GRADIENT TURUN SAMPAI SETENGAH KARTU KATALOG)
           - Gradient ditulis langsung sebagai background.
           - Area ini diberi padding bawah ekstra (+120px) supaya
             ekor gradient turun melewati judul & setengah bagian
             atas kartu katalog layanan.
           - Konten di atasnya ditarik naik dengan margin negatif
             agar tinggi layout tidak ikut membengkak.
        ====================================================== */
        .customer-top-area {
            position: relative;
            overflow: visible;
            color: white;
            /* Ekor gradient diturunkan ~3 cm (120px) dari sebelumnya */
            padding-bottom: 278px;
            background:
                radial-gradient(circle at 92% 4%, rgba(255,255,255,0.10), transparent 27%),
                radial-gradient(circle at 0% 42%, rgba(75,110,140,0.20), transparent 32%),
                radial-gradient(circle at 100% 58%, rgba(112,143,164,0.15), transparent 30%),
                linear-gradient(
                    180deg,
                    #0E1D31 0%,
                    #0E1D31 31%,
                    #11263D 40%,
                    #17334C 48%,
                    #294D65 56%,
                    #5F7C8E 64%,
                    #A7BAC6 71%,
                    #D9E3E9 78%,
                    #EDF2F6 85%,
                    #F7F9FC 93%,
                    #F7F9FC 100%
                );
        }

        /* Pastikan isi header tetap di atas lapisan gradient */
        .customer-top-area > * {
            position: relative;
            z-index: 1;
        }

        .header-circle-one {
            position: absolute;
            width: 190px;
            height: 190px;
            right: -105px;
            top: -120px;
            border-radius: 9999px;
            background: rgba(255,255,255,0.045);
            pointer-events: none;
        }

        .header-circle-two {
            position: absolute;
            width: 135px;
            height: 135px;
            left: -80px;
            top: 120px;
            border-radius: 9999px;
            background: rgba(255,255,255,0.025);
            pointer-events: none;
        }

        .header-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            color: rgba(255,255,255,0.92);
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.10);
            transition: all 0.18s ease;
        }

        .header-icon:hover {
            background: rgba(255,255,255,0.16);
        }

        .notification-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: #EF4444;
            box-shadow: 0 0 0 2px #0E1D31;
        }

        /* =====================================================
           BOTTOM NAVIGATION (PERSIS SEPERTI HALAMAN ADMIN)
        ====================================================== */
        .bottom-navigation {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 430px;
            z-index: 40;
            background: rgba(255,255,255,0.96);
            backdrop-filter: blur(16px);
            border-top: 1px solid rgba(226,232,240,0.9);
            box-shadow: 0 -4px 20px rgba(15,23,42,0.06);
        }

        .bottom-navigation-inner {
            display: flex;
            align-items: center;
            justify-content: space-around;
            height: 60px;
            padding: 0 8px;
        }

        .bottom-nav-item {
            flex: 1;
            min-height: 50px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
            margin: 0 2px;
            border-radius: 15px;
            color: #9CA3AF;
            font-size: 9.5px;
            font-weight: 500;
            transition: all 0.18s ease;
        }

        .bottom-nav-item i {
            font-size: 15px;
        }

        .bottom-nav-item:hover { color: #6B7280; }
        .bottom-nav-item:active { transform: scale(0.94); }

        .bottom-nav-item.nav-active {
            color: #173B67;
            font-weight: 700;
            background: #EFF6FF;
        }

        .bottom-nav-item.nav-active i {
            color: #173B67;
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

        /* Floating Center Suruh Button */
        .btn-center-suruh {
            width: 42px;
            height: 42px;
            border-radius: 9999px;
            background: linear-gradient(135deg, #173B67, #0E1D31);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            margin-top: -18px;
            box-shadow: 0 6px 16px rgba(23,59,103,0.35);
            border: 3px solid #FFFFFF;
            transition: all 0.2s ease;
        }

        .btn-center-suruh:hover {
            transform: scale(1.05);
        }

        /* Card styles */
        .card-sb {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(15,23,42,0.03);
        }

        /* Konten utama ditarik naik menutupi bagian bawah header yang ber-gradient.
           Nilai margin-top di-set otomatis oleh JS (syncGradientEkor),
           supaya kartu pertama selalu rapat ke header tanpa ruang kosong. */
        .content-under-gradient {
            margin-top: -158px;
            position: relative;
            z-index: 2;
        }
    </style>

    @stack('styles')
</head>
<body>

<div class="mobile-app">

    {{-- TOP AREA GRADIENT --}}
    @yield('page-top')

    {{-- MAIN CONTENT --}}
    @yield('content')

</div>

{{-- =====================================================
     BOTTOM NAVIGATION (PESANAN DIGANTI LAYANAN)
====================================================== --}}
<nav class="bottom-navigation">
    <div class="bottom-navigation-inner">
        
        {{-- HOME (hanya aktif di route HOME, bukan semua route customer) --}}
        <a href="{{ route('customer.index') }}" class="bottom-nav-item {{ request()->routeIs('customer.index') || request()->routeIs('customer.home') ? 'nav-active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>

        {{-- LAYANAN (HALAMAN KATALOG LENGKAP) --}}
        <a href="{{ route('customer.layanan') }}" class="bottom-nav-item {{ request()->routeIs('customer.layanan') || request()->routeIs('customer.service') ? 'nav-active' : '' }}" title="Semua Layanan & Jasa">
            <i class="fa-solid fa-list-check"></i>
            <span>Layanan</span>
        </a>

        {{-- MITRA --}}
        <a href="{{ route('customer.mitra') }}" class="bottom-nav-item {{ request()->routeIs('customer.mitra') ? 'nav-active' : '' }}" title="Lihat Mitra SayaBantu">
            <i class="fa-solid fa-users"></i>
            <span>Mitra</span>
        </a>

        {{-- TENTANG SAYABANTU (berwarna/aktif saat halaman Tentang dibuka) --}}
        <a href="{{ route('customer.tentang') }}" class="bottom-nav-item {{ request()->routeIs('customer.tentang') ? 'nav-active' : '' }}" title="Tentang SayaBantu">
            <i class="fa-solid fa-circle-info"></i>
            <span>Tentang</span>
        </a>
    </div>
</nav>

{{-- BURGER DRAWER MENU --}}
@include('customer.partials.customer-drawer')

{{-- MODALS & POPUPS (LOGIN MODAL, ORDER MODAL, TOAST) --}}
@include('customer.partials.customer-modals')

<script>
    // =========================================================
    //  JARAK GRADIENT OTOMATIS (semua halaman customer)
    //  - Gradient turun sejauh TURUN px melewati konten header (panjang.
    //  - Kartu pertama tetap rapat ke header, TIDAK menembus ke belakangnya.
    // =========================================================
    function syncGradientEkor() {
        const top = document.querySelector('.customer-top-area');
        const content = document.querySelector('.content-under-gradient');
        if (!top || !content) return;

        // Seberapa jauh gradient turun melewati konten header (bisa diatur).
        const TURUN = 320; // px (+120px ≈ 3 cm dari sebelumnya)

        // Reset dulu supaya pengukuran tidak terpengaruh nilai sebelumnya.
        top.style.paddingBottom = '0px';
        content.style.marginTop = '0px';
        void top.offsetHeight; // paksa reflow

        const topTop = top.getBoundingClientRect().top;

        // Tinggi konten header = jarak dari atas top-area ke dasar elemen
        // anak terakhir yang bukan dekorasi lingkaran.
        const kids = [...top.children].filter(el => {
            const c = el.className || '';
            return typeof c === 'string' && !c.includes('header-circle');
        });
        if (!kids.length) return;

        const lastKidBottom = Math.max(...kids.map(el => el.getBoundingClientRect().bottom));
        const tinggiIsiHeader = lastKidBottom - topTop; // tetap saat direset

        // padding-bottom = panjang ekor gradient yang terlihat.
        top.style.paddingBottom = TURUN + 'px';

        // Konten ditarik naik sebesar TURUN JUGA, supaya kartu pertama
        // dimulai tepat di batas bawah gradient tanpa menyisakan celah.
        // (Konten header sendiri sudah punya ruang sendiri di atas gradient.)
        content.style.marginTop = '-' + TURUN + 'px';
    }

    window.addEventListener('load', syncGradientEkor);
    window.addEventListener('resize', syncGradientEkor);
    document.addEventListener('DOMContentLoaded', syncGradientEkor);
</script>

@stack('scripts')

</body>
</html>
