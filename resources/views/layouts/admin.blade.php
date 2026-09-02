<!DOCTYPE html>

<html lang="id">

<head>


<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    @yield('title', 'Admin - SayaBantu.com')
</title>


{{-- =====================================================
     FONT
====================================================== --}}

<link rel="preconnect" href="https://fonts.googleapis.com">

<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet"
>


{{-- =====================================================
     FONT AWESOME
====================================================== --}}

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
>


{{-- =====================================================
     TAILWIND
====================================================== --}}

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
       GLOBAL
    ====================================================== */

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
    ====================================================== */

    .mobile-app {

        width: 100%;

        max-width: 430px;

        min-height: 100vh;

        margin: 0 auto;

        position: relative;

        overflow-x: hidden;

        background: #F7F9FC;

        box-shadow:
            0 0 40px rgba(15,23,42,0.14);

    }


    /* =====================================================
       HEADER + ACTIVITY BACKGROUND
       SATU WARNA / SATU ALIRAN
    ====================================================== */

    .admin-top-area {

        position: relative;

        overflow: hidden;

        color: white;

        background:

            radial-gradient(
                circle at 92% 4%,
                rgba(255,255,255,0.10),
                transparent 27%
            ),

            radial-gradient(
                circle at 0% 42%,
                rgba(75,110,140,0.20),
                transparent 32%
            ),

            radial-gradient(
                circle at 100% 58%,
                rgba(112,143,164,0.15),
                transparent 30%
            ),

            linear-gradient(
                180deg,

                #0E1D31 0%,

                #0E1D31 20%,

                #11263D 34%,

                #17334C 48%,

                #294D65 61%,

                #5F7C8E 72%,

                #A7BAC6 82%,

                #D9E3E9 91%,

                #F7F9FC 100%
            );

    }


    /* =====================================================
       HEADER FADE
    ====================================================== */

    .admin-top-area::after {

        content: '';

        position: absolute;

        left: -15%;

        right: -15%;

        bottom: -70px;

        height: 150px;

        background:
            rgba(247,249,252,0.68);

        filter:
            blur(35px);

        border-radius:
            50% 50% 0 0;

        pointer-events:
            none;

    }


    /* =====================================================
       HEADER DECORATION
    ====================================================== */

    .header-circle-one {

        position: absolute;

        width: 190px;

        height: 190px;

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

        width: 135px;

        height: 135px;

        left: -80px;

        top: 120px;

        border-radius: 9999px;

        background:
            rgba(255,255,255,0.025);

        pointer-events:
            none;

    }


    /* =====================================================
       HEADER CONTENT
    ====================================================== */

    .header-content {

        position: relative;

        z-index: 10;

    }


    /* =====================================================
       HEADER ICON
    ====================================================== */

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
    ====================================================== */

    .notification-dot {

        position: absolute;

        top: 5px;

        right: 5px;

        width: 7px;

        height: 7px;

        border-radius: 9999px;

        background: #FBBF24;

        border:
            2px solid #0E1D31;

    }


    /* =====================================================
       PROFILE
    ====================================================== */

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
       ADMIN BADGE
    ====================================================== */

    .admin-badge {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding:
            5px 10px;

        border-radius:
            9999px;

        background:
            rgba(7,18,31,0.45);

        border:
            1px solid rgba(255,255,255,0.10);

        color:
            #FBBF24;

        font-size:
            9px;

        font-weight:
            600;

        backdrop-filter:
            blur(8px);

    }


    /* =====================================================
       ACTIVITY AREA
    ====================================================== */

    .activity-area {

        position: relative;

        z-index: 5;

        padding:
            3px 20px 20px;

    }


    /* =====================================================
       ACTIVITY TITLE
    ====================================================== */

    .activity-title {

        font-size:
            18px;

        line-height:
            1.25;

        font-weight:
            700;

        letter-spacing:
            -0.02em;

        color:
            white;

    }


    .activity-subtitle {

        margin-top:
            5px;

        font-size:
            9px;

        line-height:
            1.5;

        color:
            rgba(255,255,255,0.62);

    }


    /* =====================================================
       STAT CARD
       DIPERKECIL
    ====================================================== */

    .stat-card {

        position: relative;

        overflow: hidden;

        padding:
            11px;

        min-height:
            125px;

        border-radius:
            15px;

        background:
            rgba(255,255,255,0.98);

        border:
            1px solid rgba(255,255,255,0.95);

        box-shadow:
            0 5px 16px rgba(15,23,42,0.07);

        transition:
            all 0.18s ease;

    }


    .stat-card:hover {

        transform:
            translateY(-2px);

        box-shadow:
            0 8px 22px rgba(15,23,42,0.10);

    }


    .stat-card:active {

        transform:
            scale(0.985);

    }


    /* =====================================================
       ICON
    ====================================================== */

    .icon-box {

        width: 34px;

        height: 34px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 10px;

    }


    .icon-blue {

        color:
            #2563EB;

        background:
            #EEF5FF;

    }


    .icon-green {

        color:
            #16A34A;

        background:
            #ECFDF3;

    }


    .icon-amber {

        color:
            #D97706;

        background:
            #FFF7DB;

    }


    .icon-red {

        color:
            #DC2626;

        background:
            #FEF2F2;

    }


    /* =====================================================
       STAT DECORATION
    ====================================================== */

    .stat-decoration {

        position: absolute;

        right: -22px;

        top: -22px;

        width: 72px;

        height: 72px;

        border-radius: 9999px;

        opacity: 0.75;

    }


    /* =====================================================
       MAIN
    ====================================================== */

    .admin-main {

        position: relative;

        z-index: 20;

        background:
            #F7F9FC;

        padding:
            0 20px 110px;

    }


    /* =====================================================
       SECTION
    ====================================================== */

    .section-title {

        font-size:
            14px;

        font-weight:
            700;

        color:
            #111827;

    }


    .section-link {

        font-size:
            10px;

        font-weight:
            600;

        color:
            #B77900;

    }


    /* =====================================================
       PESANAN CARD
    ====================================================== */

    .pesanan-card {

        background:
            #FFFFFF;

        border:
            1.5px solid #CBD5E1;

        border-radius:
            18px;

        box-shadow:
            0 5px 18px rgba(15,23,42,0.065);

        overflow:
            hidden;

        transition:
            all 0.18s ease;

    }


    .pesanan-card:hover {

        border-color:
            #AEBBC9;

        box-shadow:
            0 9px 25px rgba(15,23,42,0.09);

    }


    .pesanan-item {

        transition:
            background 0.18s ease;

    }


    .pesanan-item:hover {

        background:
            #F8FAFC;

    }


    .pesanan-item:active {

        background:
            #F1F5F9;

    }


    /* =====================================================
       STATUS
    ====================================================== */

    .status {

        display: inline-flex;

        align-items: center;

        padding:
            4px 8px;

        border-radius:
            9999px;

        font-size:
            8px;

        font-weight:
            600;

    }


    .status-success {

        color:
            #15803D;

        background:
            #ECFDF3;

    }


    .status-warning {

        color:
            #B45309;

        background:
            #FFF7DB;

    }


    .status-danger {

        color:
            #B91C1C;

        background:
            #FEF2F2;

    }


    /* =====================================================
       ADMIN CARD
    ====================================================== */

    .admin-card {

        background:
            #FFFFFF;

        border:
            1px solid #E2E8F0;

        border-radius:
            18px;

        box-shadow:
            0 4px 16px rgba(15,23,42,0.045);

    }


    /* =====================================================
       BOTTOM NAVIGATION
    ====================================================== */

    .bottom-navigation {

        position: fixed;

        left: 50%;

        bottom: 0;

        transform:
            translateX(-50%);

        width: 100%;

        max-width: 430px;

        z-index: 100;

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

        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap:
            4px;

    }


    .bottom-nav-item {

        min-height:
            50px;

        position: relative;

        display: flex;

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

        content: '';

        position: absolute;

        top: 0;

        left: 50%;

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

</style>


@stack('styles')


</head>

<body>

<div class="mobile-app">


{{-- =====================================================
     SATU AREA GRADIENT
====================================================== --}}

<div class="admin-top-area">


    {{-- DECORATION --}}

    <div class="header-circle-one"></div>

    <div class="header-circle-two"></div>


    {{-- =================================================
         HEADER
    ================================================== --}}

    <header
        class="px-5 pt-4"
    >

        <div
            class="header-content"
        >


            {{-- TOP NAVIGATION --}}

            <div
                class="flex items-center"
            >


                {{-- BURGER --}}

                <button
                    type="button"
                    class="header-icon shrink-0"
                    aria-label="Menu"
                >

                    <i
                        class="fa-solid fa-bars text-[16px]"
                    ></i>

                </button>


                {{-- BRAND --}}

                <div
                    class="ml-2 min-w-0 flex-1"
                >

                    <h1
                        class="truncate text-[17px] font-bold tracking-tight"
                    >
                        SayaBantu.com
                    </h1>

                </div>


                {{-- NOTIFICATION --}}

                <button
                    type="button"
                    class="header-icon relative mr-1 shrink-0"
                    aria-label="Notifikasi"
                >

                    <i
                        class="fa-regular fa-bell text-[17px]"
                    ></i>

                    <span
                        class="notification-dot"
                    ></span>

                </button>


                {{-- PROFILE --}}

                <button
                    type="button"
                    class="profile-admin shrink-0"
                    aria-label="Profil Admin"
                >
                    A
                </button>


            </div>


            {{-- ADMIN PANEL --}}

            <div
                class="mt-5"
            >

                <div
                    class="admin-badge"
                >

                    <i
                        class="fa-solid fa-shield-halved text-[8px]"
                    ></i>

                    Admin Panel

                </div>

            </div>


        </div>

    </header>


    {{-- =================================================
         RINGKASAN AKTIVITAS
    ================================================== --}}

    <section
        class="activity-area"
    >


        {{-- TITLE --}}

        <div
            class="mb-3"
        >

            <h2
                class="activity-title"
            >
                Ringkasan Aktivitas
            </h2>

            <p
                class="activity-subtitle"
            >
                Pantau aktivitas SayaBantu.com
            </p>

        </div>


        {{-- =================================================
             STAT CARDS
        ================================================== --}}

        <div
            class="grid grid-cols-2 gap-3"
        >


            {{-- PESANAN --}}

            <div
                class="stat-card"
            >

                <div
                    class="stat-decoration bg-blue-50"
                ></div>


                <div
                    class="relative flex items-start justify-between"
                >

                    <div
                        class="icon-box icon-blue"
                    >

                        <i
                            class="fa-solid fa-file-lines text-sm"
                        ></i>

                    </div>


                    <span
                        class="rounded-full bg-green-50 px-2 py-1 text-[8px] font-semibold text-green-600"
                    >
                        +12%
                    </span>

                </div>


                <div
                    class="relative mt-3"
                >

                    <p
                        class="text-[10px] font-medium text-gray-500"
                    >
                        Pesanan
                    </p>

                    <p
                        class="mt-1 text-[20px] font-bold leading-none text-gray-900"
                    >
                        {{ $totalPesanan ?? 0 }}
                    </p>

                    <p
                        class="mt-1.5 text-[8px] text-gray-400"
                    >
                        dari hari sebelumnya
                    </p>

                </div>

            </div>


            {{-- PEMBAYARAN --}}

            <div
                class="stat-card"
            >

                <div
                    class="stat-decoration bg-green-50"
                ></div>


                <div
                    class="relative flex items-start justify-between"
                >

                    <div
                        class="icon-box icon-green"
                    >

                        <i
                            class="fa-solid fa-credit-card text-sm"
                        ></i>

                    </div>


                    <span
                        class="rounded-full bg-green-50 px-2 py-1 text-[8px] font-semibold text-green-600"
                    >
                        Aktif
                    </span>

                </div>


                <div
                    class="relative mt-3"
                >

                    <p
                        class="text-[10px] font-medium text-gray-500"
                    >
                        Pembayaran
                    </p>

                    <p
                        class="mt-1 text-[20px] font-bold leading-none text-gray-900"
                    >
                        {{ $totalPembayaran ?? 0 }}
                    </p>

                    <p
                        class="mt-1.5 text-[8px] text-gray-400"
                    >
                        transaksi tercatat
                    </p>

                </div>

            </div>


            {{-- PENGGUNA --}}

            <div
                class="stat-card"
            >

                <div
                    class="stat-decoration bg-amber-50"
                ></div>


                <div
                    class="relative flex items-start justify-between"
                >

                    <div
                        class="icon-box icon-amber"
                    >

                        <i
                            class="fa-solid fa-users text-sm"
                        ></i>

                    </div>


                    <span
                        class="rounded-full bg-gray-100 px-2 py-1 text-[8px] font-semibold text-gray-500"
                    >
                        Total
                    </span>

                </div>


                <div
                    class="relative mt-3"
                >

                    <p
                        class="text-[10px] font-medium text-gray-500"
                    >
                        Pengguna
                    </p>

                    <p
                        class="mt-1 text-[20px] font-bold leading-none text-gray-900"
                    >
                        {{ $totalPengguna ?? 0 }}
                    </p>

                    <p
                        class="mt-1.5 text-[8px] text-gray-400"
                    >
                        pengguna terdaftar
                    </p>

                </div>

            </div>


            {{-- KONFLIK --}}

            <div
                class="stat-card"
            >

                <div
                    class="stat-decoration bg-red-50"
                ></div>


                <div
                    class="relative flex items-start justify-between"
                >

                    <div
                        class="icon-box icon-red"
                    >

                        <i
                            class="fa-solid fa-triangle-exclamation text-sm"
                        ></i>

                    </div>


                    <span
                        class="rounded-full bg-red-50 px-2 py-1 text-[8px] font-semibold text-red-500"
                    >
                        Perlu cek
                    </span>

                </div>


                <div
                    class="relative mt-3"
                >

                    <p
                        class="text-[10px] font-medium text-gray-500"
                    >
                        Konflik
                    </p>

                    <p
                        class="mt-1 text-[20px] font-bold leading-none text-gray-900"
                    >
                        {{ $totalKonflik ?? 0 }}
                    </p>

                    <p
                        class="mt-1.5 text-[8px] text-gray-400"
                    >
                        membutuhkan perhatian
                    </p>

                </div>

            </div>


        </div>

    </section>


</div>


{{-- =====================================================
     MAIN CONTENT
====================================================== --}}

<main
    class="admin-main"
>

    @yield('content')

</main>


</div>

{{-- =====================================================
BOTTOM NAVIGATION
====================================================== --}}

<nav
    class="bottom-navigation"
>


<div
    class="bottom-navigation-inner"
>


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
