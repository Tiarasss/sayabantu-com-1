<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Pembayaran - SayaBantu.com')
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

           GRADIENT DIPENDEKKAN
           SAMPAI SEKITAR 1/2 CARD TRANSAKSI
        ===================================================== */

        .pembayaran-top-area {

            position: relative;

            overflow: visible;

            color: white;

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


        .pembayaran-top-area::after {
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

           SAMA DENGAN PESANAN
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

        .pembayaran-heading {

            position: relative;

            z-index: 5;

            padding:
                22px 20px 0;
        }


        .pembayaran-heading h2 {

            font-size: 21px;

            line-height: 1.25;

            font-weight: 700;

            letter-spacing: -0.025em;

            color: white;
        }


        .pembayaran-heading p {

            margin-top: 5px;

            font-size: 9px;

            line-height: 1.5;

            color:
                rgba(255,255,255,0.65);
        }


        /* =====================================================
           SALDO ADMIN
        ===================================================== */

        .pembayaran-balance {

            position: relative;

            z-index: 10;

            padding:
                16px 20px 0;
        }


        .balance-card {

            position: relative;

            overflow: hidden;

            border-radius: 20px;

            border:
                1px solid rgba(255,255,255,0.18);

            background:
                rgba(255,255,255,0.10);

            padding: 18px;

            box-shadow:
                0 8px 25px rgba(15,23,42,0.10);

            backdrop-filter:
                blur(10px);
        }


        .balance-circle-one {

            position: absolute;

            width: 110px;
            height: 110px;

            right: -45px;
            top: -50px;

            border-radius: 9999px;

            background:
                rgba(255,255,255,0.08);
        }


        .balance-circle-two {

            position: absolute;

            width: 80px;
            height: 80px;

            left: -35px;
            bottom: -40px;

            border-radius: 9999px;

            background:
                rgba(255,255,255,0.05);
        }


        .balance-content {

            position: relative;

            z-index: 2;
        }


        .balance-label {

            font-size: 9px;

            font-weight: 500;

            color:
                rgba(255,255,255,0.70);
        }


        .balance-subtitle {

            margin-top: 3px;

            font-size: 8px;

            color:
                rgba(255,255,255,0.50);
        }


        .balance-value {

            margin-top: 13px;

            font-size: 23px;

            line-height: 1;

            font-weight: 700;

            letter-spacing: -0.025em;

            color: white;
        }


        .balance-footer {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: 13px;
        }


        .balance-description {

            font-size: 8px;

            color:
                rgba(255,255,255,0.58);
        }


        .balance-active {

            border-radius: 9999px;

            padding: 5px 9px;

            font-size: 7px;

            font-weight: 600;

            color: white;

            background:
                rgba(255,255,255,0.15);
        }


        /* =====================================================
           RINGKASAN DANA
        ===================================================== */

        .pembayaran-summary {

            position: relative;

            z-index: 10;

            padding:
                12px 20px 0;
        }


        .summary-grid-payment {

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 6px;

            width: 100%;
        }


        .summary-payment-card {

            min-width: 0;

            border-radius: 13px;

            padding:
                9px 5px 10px;

            box-shadow:
                0 5px 14px rgba(15,23,42,0.055);
        }


        .summary-payment-label {

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


        .summary-payment-number {

            margin-top: 4px;

            font-size: 12px;

            line-height: 1;

            font-weight: 700;

            color:
                #173B67;

            white-space: nowrap;
        }


        .summary-payment-description {

            margin-top: 4px;

            font-size: 6.5px;

            line-height: 1.2;

            white-space: nowrap;
        }


        .summary-payment-yellow {

            border:
                1px solid #FEF3C7;

            background:
                linear-gradient(
                    135deg,
                    #FFFBEB,
                    #FFFFFF
                );
        }


        .summary-payment-green {

            border:
                1px solid #DCFCE7;

            background:
                linear-gradient(
                    135deg,
                    #F0FDF4,
                    #FFFFFF
                );
        }


        .summary-payment-blue {

            border:
                1px solid #DBEAFE;

            background:
                linear-gradient(
                    135deg,
                    #EFF6FF,
                    #FFFFFF
                );
        }


        /* =====================================================
           STATUS TRANSAKSI
        ===================================================== */

        .pembayaran-status {

            position: relative;

            z-index: 10;

            padding:
                14px 20px 0;
        }


        .pembayaran-status-title {

            font-size:
                14px;

            font-weight:
                700;

            color:
                #FFFFFF;
        }


        .pembayaran-status-subtitle {

            margin-top:
                4px;

            font-size:
                8px;

            color:
                rgba(255,255,255,0.60);
        }


        .status-payment-grid {

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap:
                6px;

            margin-top:
                9px;
        }


        .status-payment-card {

            min-width:
                0;

            border-radius:
                13px;

            padding:
                9px 6px;

            background:
                rgba(255,255,255,0.10);

            border:
                1px solid rgba(255,255,255,0.13);

            backdrop-filter:
                blur(8px);
        }


        .status-payment-label {

            font-size:
                7.5px;

            line-height:
                1.2;

            font-weight:
                500;

            color:
                rgba(255,255,255,0.68);
        }


        .status-payment-number {

            margin-top:
                4px;

            font-size:
                17px;

            line-height:
                1;

            font-weight:
                700;

            color:
                white;
        }


        /* =====================================================
           FILTER
        ===================================================== */

        .pembayaran-filter {

            position:
                relative;

            z-index:
                10;

            padding:
                14px 20px 25px;
        }


        .pembayaran-filter-inner {

            display:
                flex;

            justify-content:
                center;

            gap:
                6px;

            overflow-x:
                auto;

            padding:
                0 0 2px;
        }


        .payment-filter {

            flex-shrink:
                0;

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


        .payment-filter:hover {

            background:
                rgba(255,255,255,0.14);
        }


        .payment-filter.active-filter {

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
           MAIN PEMBAYARAN

           OVERLAP LEBIH PENDEK
        ===================================================== */

        .pembayaran-main {

            position:
                relative;

            z-index:
                20;

            background:
                transparent;

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

        .section-header-payment {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            margin-bottom:
                12px;
        }


        .section-title-payment {

            font-size:
                14px;

            font-weight:
                700;

            color:
                #FFFFFF;
        }


        .section-count-payment {

            font-size:
                9px;

            font-weight:
                600;

            color:
                #FFFFFF;
        }


        .section-header-payment p {

            color:
                #FFFFFF !important;
        }


        /* =====================================================
           PAYMENT CARD
        ===================================================== */

        .payment-card {

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


        .payment-card:hover {

            transform:
                translateY(-1px);

            border-color:
                #CBD5E1;

            box-shadow:
                0 8px 22px rgba(15,23,42,0.08);
        }


        .payment-card:active {

            transform:
                scale(0.99);
        }


        .payment-card-body {

            padding:
                13px 14px;
        }


        .payment-number {

            font-size:
                10px;

            font-weight:
                700;

            color:
                #111827;
        }


        .payment-order {

            margin-top:
                3px;

            font-size:
                8px;

            color:
                #94A3B8;
        }


        .payment-method-label {

            font-size:
                7px;

            color:
                #94A3B8;
        }


        .payment-method {

            margin-top:
                2px;

            font-size:
                8px;

            color:
                #64748B;

            font-weight:
                500;
        }


        .payment-total-label {

            font-size:
                7px;

            color:
                #94A3B8;
        }


        .payment-total {

            margin-top:
                2px;

            font-size:
                11px;

            font-weight:
                700;

            color:
                #173B67;
        }


        /* =====================================================
           PAYMENT STATUS BADGE
        ===================================================== */

        .payment-status-badge {

            display:
                inline-flex;

            align-items:
                center;

            padding:
                5px 8px;

            border-radius:
                9999px;

            font-size:
                8px;

            font-weight:
                600;
        }


        .payment-status-waiting {

            color:
                #B45309;

            background:
                #FFF7DB;
        }


        .payment-status-success {

            color:
                #15803D;

            background:
                #ECFDF3;
        }


        .payment-status-failed {

            color:
                #B91C1C;

            background:
                #FEF2F2;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .payment-empty-state {

            padding:
                42px 20px;

            text-align:
                center;
        }


        .payment-empty-icon {

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


        .payment-empty-state h3 {

            font-size:
                11px;

            font-weight:
                600;

            color:
                #475569;
        }


        .payment-empty-state p {

            margin-top:
                4px;

            font-size:
                8px;

            color:
                #94A3B8;
        }


        /* =====================================================
           BOTTOM NAVIGATION

           SAMA PERSIS DENGAN PESANAN
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

            .summary-grid-payment,
            .status-payment-grid {

                gap:
                    4px;
            }


            .summary-payment-card {

                padding:
                    8px 3px 9px;
            }


            .summary-payment-number {

                font-size:
                    10px;
            }


            .status-payment-number {

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