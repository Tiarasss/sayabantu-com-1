<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Pesanan - SayaBantu.com')
    </title>

    {{-- FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    {{-- FONT AWESOME --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

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

        html,
        body {
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
           MOBILE FRAME
        ===================================================== */

        .mobile-app {

            width: 100%;
            max-width: 430px;
            min-height: 100vh;

            margin: 0 auto;

            position: relative;

            overflow: visible;

            background: #F7F9FC;

            box-shadow:
                0 0 40px rgba(15, 23, 42, 0.14);
        }


        /* =====================================================
           TOP GRADIENT
           
           GRADIENT PESANAN DAN DETAIL SAMA
        ===================================================== */

        .pesanan-top-area {

            position: relative;

            overflow: visible;

            color: white;

            /*
             * Gradient diperpanjang sedikit.
             * Semua warna tetap sama.
             */
            padding-bottom: 175px;

            background:

                linear-gradient(
                    180deg,

                    #0E1D31 0%,
                    #0E1D31 20%,
                    #17334C 40%,
                    #294D65 55%,
                    #5F7C8E 70%,
                    #A7BAC6 85%,
                    #F7F9FC 100%
                );
        }


        .pesanan-top-area::after {

            display: none;
        }


        /* =====================================================
           DECORATION
        ===================================================== */

        .header-circle-one {

            position: absolute;

            width: 180px;
            height: 180px;

            right: -105px;
            top: -120px;

            border-radius: 9999px;

            background:
                rgba(255,255,255,0.045);

            pointer-events:
                none;
        }


        .header-circle-two {

            position: absolute;

            width: 130px;
            height: 130px;

            left: -78px;
            top: 135px;

            border-radius: 9999px;

            background:
                rgba(255,255,255,0.025);

            pointer-events:
                none;
        }


        /* =====================================================
           HEADER
        ===================================================== */

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

            color:
                rgba(255,255,255,0.92);

            background:
                rgba(255,255,255,0.035);

            transition:
                all 0.18s ease;
        }


        .header-icon:hover {

            background:
                rgba(255,255,255,0.10);
        }


        .header-icon:active {

            transform:
                scale(0.92);
        }


        /* =====================================================
           NOTIFICATION
        ===================================================== */

        .notification-dot {

            position: absolute;

            top: 5px;
            right: 5px;

            width: 7px;
            height: 7px;

            border-radius: 9999px;

            background:
                #FBBF24;

            border:
                2px solid #0E1D31;
        }


        /* =====================================================
           PROFILE
        ===================================================== */

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

            background:
                rgba(255,255,255,0.10);

            border:
                1px solid rgba(255,255,255,0.22);

            backdrop-filter:
                blur(8px);

            transition:
                all 0.18s ease;
        }


        .profile-admin:hover {

            background:
                rgba(255,255,255,0.16);
        }


        .profile-admin:active {

            transform:
                scale(0.92);
        }


        /* =====================================================
           HEADING
        ===================================================== */

        .pesanan-heading {

            position: relative;

            z-index: 5;

            padding:
                22px 20px 0;
        }


        .pesanan-heading h2 {

            font-size: 21px;

            line-height: 1.25;

            font-weight: 700;

            letter-spacing: -0.025em;

            color: white;
        }


        .pesanan-heading p {

            margin-top: 5px;

            font-size: 9px;

            line-height: 1.5;

            color:
                rgba(255,255,255,0.65);
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .pesanan-summary {

            position: relative;

            z-index: 10;

            padding:
                16px 20px 0;
        }


        .summary-grid {

            display: grid;

            grid-template-columns:
                repeat(5, minmax(0, 1fr));

            gap: 6px;

            width: 100%;
        }


        .summary-card {

            min-width: 0;

            border-radius: 13px;

            padding:
                9px 5px 10px;

            text-align: center;

            box-shadow:
                0 5px 14px rgba(15,23,42,0.055);

            transition:
                transform 0.18s ease;
        }


        .summary-card:active {

            transform:
                scale(0.97);
        }


        .summary-label {

            display: block;

            overflow: hidden;

            white-space: nowrap;

            text-overflow: ellipsis;

            font-size: 7.5px;

            line-height: 1.2;

            font-weight: 600;

            color:
                #64748B;
        }


        .summary-number {

            margin-top: 4px;

            font-size: 17px;

            line-height: 1;

            font-weight: 700;

            color:
                #173B67;
        }


        .summary-blue {

            border:
                1px solid #DBEAFE;

            background:
                linear-gradient(
                    135deg,
                    #EFF6FF,
                    #FFFFFF
                );
        }


        .summary-yellow {

            border:
                1px solid #FEF3C7;

            background:
                linear-gradient(
                    135deg,
                    #FFFBEB,
                    #FFFFFF
                );
        }


        .summary-orange {

            border:
                1px solid #FFEDD5;

            background:
                linear-gradient(
                    135deg,
                    #FFF7ED,
                    #FFFFFF
                );
        }


        .summary-green {

            border:
                1px solid #DCFCE7;

            background:
                linear-gradient(
                    135deg,
                    #F0FDF4,
                    #FFFFFF
                );
        }


        .summary-red {

            border:
                1px solid #FEE2E2;

            background:
                linear-gradient(
                    135deg,
                    #FEF2F2,
                    #FFFFFF
                );
        }


        /* =====================================================
           FILTER
           
           TETAP DI DALAM GRADIENT
        ===================================================== */

        .pesanan-filter {

            position: relative;

            z-index: 10;

            padding:
                14px 20px 25px;
        }


        .pesanan-filter-inner {

            display: flex;

            justify-content: center;

            gap: 6px;

            overflow-x: auto;

            padding:
                0 0 2px;
        }


        .filter-item {

            flex-shrink: 0;

            padding:
                7px 11px;

            border-radius:
                9999px;

            font-size:
                8.5px;

            font-weight:
                600;

            color:
                rgba(255,255,255,0.70);

            background:
                rgba(255,255,255,0.08);

            border:
                1px solid rgba(255,255,255,0.10);

            transition:
                all 0.18s ease;
        }


        .filter-item:hover {

            background:
                rgba(255,255,255,0.14);
        }


        .filter-item.active {

            color:
                #0E1D31;

            background:
                #FBBF24;

            border-color:
                #FBBF24;

            box-shadow:
                0 4px 12px rgba(251,191,36,0.20);
        }


        /* =====================================================
           MAIN PESANAN
        ===================================================== */

        .pesanan-main {

            position: relative;

            z-index: 20;

            background:
                transparent;

            /*
             * Dinaikkan ke area gradient.
             */
            margin-top:
                -175px;

            padding:
                0 20px 105px;

            min-height:
                60vh;
        }


        /* =====================================================
           SECTION HEADER
        ===================================================== */

        .section-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom:
                12px;
        }


        .section-title {

            font-size:
                14px;

            font-weight:
                700;

            color:
                #FFFFFF;
        }


        .section-count {

            font-size:
                9px;

            font-weight:
                600;

            color:
                #FFFFFF;
        }


        .section-header p {

            color:
                #FFFFFF !important;
        }


        /* =====================================================
           ORDER CARD
        ===================================================== */

        .order-card {

            position:
                relative;

            background:
                #FFFFFF;

            border:
                1px solid #E2E8F0;

            border-radius:
                17px;

            box-shadow:
                0 5px 18px rgba(15,23,42,0.055);

            overflow:
                hidden;

            transition:
                all 0.18s ease;
        }


        .order-card:hover {

            transform:
                translateY(-1px);

            border-color:
                #CBD5E1;

            box-shadow:
                0 8px 22px rgba(15,23,42,0.08);
        }


        .order-card:active {

            transform:
                scale(0.99);
        }


        .order-card-top {

            padding:
                13px 14px 11px;

            border-bottom:
                1px solid #F1F5F9;
        }


        .order-number {

            font-size:
                10px;

            font-weight:
                700;

            color:
                #111827;
        }


        .order-date {

            margin-top:
                3px;

            font-size:
                8px;

            color:
                #94A3B8;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .order-status {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                5px;

            padding:
                5px 8px;

            border-radius:
                9999px;

            font-size:
                8px;

            font-weight:
                600;
        }


        .status-waiting {

            color:
                #B45309;

            background:
                #FFF7DB;
        }


        .status-process {

            color:
                #2563EB;

            background:
                #EEF5FF;
        }


        .status-success {

            color:
                #15803D;

            background:
                #ECFDF3;
        }


        .status-conflict {

            color:
                #B91C1C;

            background:
                #FEF2F2;
        }


        /* =====================================================
           ORDER BODY
        ===================================================== */

        .order-card-body {

            padding:
                13px 14px;
        }


        .order-service {

            font-size:
                11px;

            font-weight:
                600;

            color:
                #1F2937;
        }


        .order-detail {

            display:
                flex;

            align-items:
                center;

            gap:
                7px;

            margin-top:
                8px;
        }


        .order-detail i {

            width:
                20px;

            height:
                20px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                7px;

            color:
                #64748B;

            background:
                #F8FAFC;

            font-size:
                8px;
        }


        .order-detail span {

            font-size:
                8px;

            color:
                #64748B;
        }


        /* =====================================================
           ORDER FOOTER
        ===================================================== */

        .order-card-footer {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            padding:
                10px 14px;

            background:
                #FAFBFC;

            border-top:
                1px solid #F1F5F9;
        }


        .order-price-label {

            font-size:
                7px;

            color:
                #94A3B8;
        }


        .order-price {

            margin-top:
                2px;

            font-size:
                11px;

            font-weight:
                700;

            color:
                #111827;
        }


        .detail-button {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                5px;

            padding:
                7px 10px;

            border-radius:
                9px;

            color:
                #B77900;

            background:
                #FFF8E1;

            font-size:
                8px;

            font-weight:
                600;

            transition:
                all 0.18s ease;
        }


        .detail-button:hover {

            background:
                #FEF3C7;
        }


        .detail-button:active {

            transform:
                scale(0.95);
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty-state {

            padding:
                42px 20px;

            text-align:
                center;
        }


        .empty-icon {

            width:
                46px;

            height:
                46px;

            margin:
                0 auto 12px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                14px;

            color:
                #94A3B8;

            background:
                #F1F5F9;
        }


        .empty-state h3 {

            font-size:
                11px;

            font-weight:
                600;

            color:
                #475569;
        }


        .empty-state p {

            margin-top:
                4px;

            font-size:
                8px;

            color:
                #94A3B8;
        }


        /* =====================================================
           DETAIL PAGE
           
           GRADIENT DETAIL MENGIKUTI GRADIENT PESANAN
        ===================================================== */

        .detail-main {

            position:
                relative;

            z-index:
                20;

            /*
             * Jangan beri background putih di sini.
             * Gradient berasal dari .pesanan-top-area.
             */
            background:
                transparent;

            /*
             * Card/detail dinaikkan ke area gradient.
             */
            margin-top:
                -175px;

            padding:
                0 20px 105px;

            min-height:
                65vh;
        }


        .detail-back {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                7px;

            color:
                #294D65;

            font-size:
                10px;

            font-weight:
                600;

            margin-bottom:
                15px;
        }


        .detail-header {

            display:
                flex;

            align-items:
                flex-start;

            justify-content:
                space-between;

            gap:
                12px;

            margin-bottom:
                15px;
        }


        .detail-label {

            font-size:
                9px;

            font-weight:
                500;

            color:
                #94A3B8;
        }


        .detail-order-number {

            margin-top:
                4px;

            font-size:
                20px;

            line-height:
                1.2;

            font-weight:
                700;

            color:
                #0E1D31;
        }


        .detail-card {

            background:
                #FFFFFF;

            border:
                1px solid #E2E8F0;

            border-radius:
                17px;

            box-shadow:
                0 5px 18px rgba(15,23,42,0.05);
        }


        .detail-card + .detail-card {

            margin-top:
                12px;
        }


        /* =====================================================
           BOTTOM NAVIGATION
        ===================================================== */

        .bottom-navigation {

            position:
                fixed;

            left:
                50%;

            bottom:
                0;

            transform:
                translateX(-50%);

            width:
                100%;

            max-width:
                430px;

            z-index:
                100;

            padding:
                6px 10px 8px;

            background:
                rgba(255,255,255,0.97);

            backdrop-filter:
                blur(18px);

            -webkit-backdrop-filter:
                blur(18px);

            border-top:
                1px solid #E5E7EB;

            box-shadow:
                0 -5px 22px rgba(15,23,42,0.055);
        }


        .bottom-navigation-inner {

            display:
                grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap:
                4px;
        }


        .bottom-nav-item {

            min-height:
                50px;

            position:
                relative;

            display:
                flex;

            flex-direction:
                column;

            align-items:
                center;

            justify-content:
                center;

            gap:
                4px;

            border-radius:
                15px;

            color:
                #9CA3AF;

            transition:
                all 0.18s ease;
        }


        .bottom-nav-item i {

            font-size:
                15px;
        }


        .bottom-nav-item span {

            font-size:
                9px;

            line-height:
                1;

            font-weight:
                500;
        }


        .bottom-nav-item:hover {

            color:
                #6B7280;
        }


        .bottom-nav-item:active {

            transform:
                scale(0.94);
        }


        .bottom-nav-item.nav-active {

            color:
                #B77900;

            background:
                #FFF8E1;
        }


        .bottom-nav-item.nav-active::before {

            content:
                '';

            position:
                absolute;

            top:
                0;

            left:
                50%;

            transform:
                translateX(-50%);

            width:
                22px;

            height:
                3px;

            border-radius:
                0 0 6px 6px;

            background:
                #FBBF24;
        }


        /* =====================================================
           SMALL SCREEN
        ===================================================== */

        @media (max-width: 360px) {

            .summary-grid {

                gap:
                    4px;
            }

            .summary-card {

                padding:
                    8px 3px 9px;
            }

            .summary-label {

                font-size:
                    7px;
            }

            .summary-number {

                font-size:
                    15px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>

<div class="mobile-app">

    @yield('page-top')

    @yield('content')

</div>


{{-- =====================================================
BOTTOM NAVIGATION
===================================================== --}}

<nav class="bottom-navigation">

    <div class="bottom-navigation-inner">

        {{-- HOME --}}
        <a
            href="{{ route('admin.dashboard') }}"
            class="
                bottom-nav-item
                {{ request()->routeIs('admin.dashboard')
                    ? 'nav-active'
                    : ''
                }}
            "
        >

            <i class="fa-solid fa-house"></i>

            <span>
                Home
            </span>

        </a>


        {{-- PESANAN --}}
        <a
            href="{{ route('admin.pesanan') }}"
            class="
                bottom-nav-item
                {{ request()->routeIs('admin.pesanan*')
                    ? 'nav-active'
                    : ''
                }}
            "
        >

            <i class="fa-solid fa-file-lines"></i>

            <span>
                Pesanan
            </span>

        </a>


        {{-- PEMBAYARAN --}}
        <a
            href="{{ route('admin.pembayaran') }}"
            class="
                bottom-nav-item
                {{ request()->routeIs('admin.pembayaran*')
                    ? 'nav-active'
                    : ''
                }}
            "
        >

            <i class="fa-solid fa-credit-card"></i>

            <span>
                Bayar
            </span>

        </a>


        {{-- PROFIL --}}
        <a
            href="#"
            class="bottom-nav-item"
        >

            <i class="fa-solid fa-user"></i>

            <span>
                Profil
            </span>

        </a>

    </div>

</nav>


@stack('scripts')

</body>

</html>