@extends('layouts.admin-pesanan')

@section('title', 'Pesanan - SayaBantu.com')


{{-- =========================================================
TOP AREA
SEMUA BAGIAN INI MASIH GRADIENT
========================================================= --}}

@section('page-top')

<div class="pesanan-top-area">

    {{-- DECORATION --}}
    <div class="header-circle-one"></div>
    <div class="header-circle-two"></div>


    {{-- =====================================================
    HEADER
    ====================================================== --}}

    <header class="relative z-10 px-5 pt-4">

        <div class="header-content">

            <div class="flex items-center">

                {{-- BURGER --}}
                <button
                    type="button"
                    class="header-icon shrink-0"
                    aria-label="Menu"
                >

                    <i class="fa-solid fa-bars text-[16px]"></i>

                </button>


                {{-- BRAND --}}
                <div class="ml-2 min-w-0 flex-1">

                    <h1
                        class="truncate text-[17px] font-bold tracking-tight text-white"
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

                    <i class="fa-regular fa-bell text-[17px]"></i>

                    <span class="notification-dot"></span>

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

        </div>

    </header>


    {{-- =====================================================
    JUDUL
    ====================================================== --}}

    <section class="pesanan-heading">

        <h2>
            Pesanan
        </h2>

        <p>
            Kelola dan pantau seluruh pesanan SayaBantu.com
        </p>

    </section>


    {{-- =====================================================
    SUMMARY
    5 CARD HARUS MUAT SATU LAYAR
    ====================================================== --}}

    <section class="pesanan-summary">

        <div class="summary-grid">

            {{-- SEMUA --}}
            <div class="summary-card summary-blue">

                <span class="summary-label">
                    Semua
                </span>

                <span class="summary-number">
                    12
                </span>

            </div>


            {{-- MENUNGGU --}}
            <div class="summary-card summary-yellow">

                <span class="summary-label">
                    Menunggu
                </span>

                <span class="summary-number">
                    4
                </span>

            </div>


            {{-- DIPROSES --}}
            <div class="summary-card summary-orange">

                <span class="summary-label">
                    Diproses
                </span>

                <span class="summary-number">
                    4
                </span>

            </div>


            {{-- SELESAI --}}
            <div class="summary-card summary-green">

                <span class="summary-label">
                    Selesai
                </span>

                <span class="summary-number">
                    2
                </span>

            </div>


            {{-- KONFLIK --}}
            <div class="summary-card summary-red">

                <span class="summary-label">
                    Konflik
                </span>

                <span class="summary-number">
                    2
                </span>

            </div>

        </div>

    </section>


    {{-- =====================================================
    FILTER
    MASIH DI DALAM GRADIENT
    ====================================================== --}}

    <section class="pesanan-filter">

        <div class="pesanan-filter-inner">

            <a
                href="{{ route('admin.pesanan') }}"
                class="
                    filter-item
                    {{ request()->query('status') === null ? 'active' : '' }}
                "
            >
                Semua
            </a>


            <a
                href="{{ route('admin.pesanan', ['status' => 'menunggu']) }}"
                class="
                    filter-item
                    {{ request()->query('status') === 'menunggu' ? 'active' : '' }}
                "
            >
                Menunggu
            </a>


            <a
                href="{{ route('admin.pesanan', ['status' => 'diproses']) }}"
                class="
                    filter-item
                    {{ request()->query('status') === 'diproses' ? 'active' : '' }}
                "
            >
                Diproses
            </a>


            <a
                href="{{ route('admin.pesanan', ['status' => 'selesai']) }}"
                class="
                    filter-item
                    {{ request()->query('status') === 'selesai' ? 'active' : '' }}
                "
            >
                Selesai
            </a>


            <a
                href="{{ route('admin.pesanan', ['status' => 'konflik']) }}"
                class="
                    filter-item
                    {{ request()->query('status') === 'konflik' ? 'active' : '' }}
                "
            >
                Konflik
            </a>

        </div>

    </section>

</div>

@endsection



{{-- =========================================================
CONTENT
PUTIH DIMULAI DARI SINI
========================================================= --}}

@section('content')

<main class="pesanan-main">

    {{-- =====================================================
    DAFTAR PESANAN
    ====================================================== --}}

    <section>

        <div class="section-header">

            <div>

                <h3 class="section-title">
                    Daftar Pesanan
                </h3>

                <p class="mt-1 text-[9px] leading-relaxed text-slate-400">
                    Klik pesanan untuk melihat detail.
                </p>

            </div>

            <span
                id="visibleOrderCount"
                class="section-count"
            >
                6 Pesanan
            </span>

        </div>


        {{-- =================================================
        ORDER LIST
        ================================================== --}}

        <div
            id="orderList"
            class="space-y-3"
        >


            {{-- PESANAN 1 --}}
            <a
                href="{{ route('admin.pesanan.detail', 1024) }}"
                class="order-item order-card block"
                data-status="diproses"
            >

                <div class="order-card-top">

                    <div class="flex items-start justify-between gap-3">

                        <div class="min-w-0">

                            <p class="order-number">
                                #SB1024
                            </p>

                            <p class="order-date">
                                31 Agustus 2026
                            </p>

                        </div>

                        <span class="order-status status-process">
                            Diproses
                        </span>

                    </div>

                </div>


                <div class="order-card-body">

                    <p class="order-service">
                        Bersihkan Rumah
                    </p>

                    <div class="order-detail">

                        <i class="fa-solid fa-user"></i>

                        <span>
                            Customer: Andi
                        </span>

                    </div>

                    <div class="order-detail">

                        <i class="fa-solid fa-handshake"></i>

                        <span>
                            Mitra: Budi
                        </span>

                    </div>

                </div>


                <div class="order-card-footer">

                    <div>

                        <p class="order-price-label">
                            Total
                        </p>

                        <p class="order-price">
                            Rp150.000
                        </p>

                    </div>

                    <span class="detail-button">

                        Detail

                        <i class="fa-solid fa-chevron-right text-[7px]"></i>

                    </span>

                </div>

            </a>


            {{-- PESANAN 2 --}}
            <a
                href="{{ route('admin.pesanan.detail', 1023) }}"
                class="order-item order-card block"
                data-status="selesai"
            >

                <div class="order-card-top">

                    <div class="flex items-start justify-between gap-3">

                        <div class="min-w-0">

                            <p class="order-number">
                                #SB1023
                            </p>

                            <p class="order-date">
                                31 Agustus 2026
                            </p>

                        </div>

                        <span class="order-status status-success">
                            Selesai
                        </span>

                    </div>

                </div>


                <div class="order-card-body">

                    <p class="order-service">
                        Antar Barang
                    </p>

                    <div class="order-detail">

                        <i class="fa-solid fa-user"></i>

                        <span>
                            Customer: Sinta
                        </span>

                    </div>

                    <div class="order-detail">

                        <i class="fa-solid fa-handshake"></i>

                        <span>
                            Mitra: Rian
                        </span>

                    </div>

                </div>


                <div class="order-card-footer">

                    <div>

                        <p class="order-price-label">
                            Total
                        </p>

                        <p class="order-price">
                            Rp75.000
                        </p>

                    </div>

                    <span class="detail-button">

                        Detail

                        <i class="fa-solid fa-chevron-right text-[7px]"></i>

                    </span>

                </div>

            </a>


            {{-- PESANAN 3 --}}
            <a
                href="{{ route('admin.pesanan.detail', 1022) }}"
                class="order-item order-card block"
                data-status="konflik"
            >

                <div class="order-card-top">

                    <div class="flex items-start justify-between gap-3">

                        <div class="min-w-0">

                            <p class="order-number">
                                #SB1022
                            </p>

                            <p class="order-date">
                                30 Agustus 2026
                            </p>

                        </div>

                        <span class="order-status status-conflict">
                            Konflik
                        </span>

                    </div>

                </div>


                <div class="order-card-body">

                    <p class="order-service">
                        Servis AC
                    </p>

                    <div class="order-detail">

                        <i class="fa-solid fa-user"></i>

                        <span>
                            Customer: Dimas
                        </span>

                    </div>

                    <div class="order-detail">

                        <i class="fa-solid fa-handshake"></i>

                        <span>
                            Mitra: Agus
                        </span>

                    </div>

                </div>


                <div class="order-card-footer">

                    <div>

                        <p class="order-price-label">
                            Total
                        </p>

                        <p class="order-price">
                            Rp250.000
                        </p>

                    </div>

                    <span class="detail-button">

                        Detail

                        <i class="fa-solid fa-chevron-right text-[7px]"></i>

                    </span>

                </div>

            </a>


            {{-- PESANAN 4 --}}
            <a
                href="{{ route('admin.pesanan.detail', 1021) }}"
                class="order-item order-card block"
                data-status="menunggu"
            >

                <div class="order-card-top">

                    <div class="flex items-start justify-between gap-3">

                        <div class="min-w-0">

                            <p class="order-number">
                                #SB1021
                            </p>

                            <p class="order-date">
                                30 Agustus 2026
                            </p>

                        </div>

                        <span class="order-status status-waiting">
                            Menunggu
                        </span>

                    </div>

                </div>


                <div class="order-card-body">

                    <p class="order-service">
                        Cuci Motor
                    </p>

                    <div class="order-detail">

                        <i class="fa-solid fa-user"></i>

                        <span>
                            Customer: Raka
                        </span>

                    </div>

                    <div class="order-detail">

                        <i class="fa-solid fa-handshake"></i>

                        <span>
                            Mitra: Belum ada
                        </span>

                    </div>

                </div>


                <div class="order-card-footer">

                    <div>

                        <p class="order-price-label">
                            Total
                        </p>

                        <p class="order-price">
                            Rp50.000
                        </p>

                    </div>

                    <span class="detail-button">

                        Detail

                        <i class="fa-solid fa-chevron-right text-[7px]"></i>

                    </span>

                </div>

            </a>


            {{-- PESANAN 5 --}}
            <a
                href="{{ route('admin.pesanan.detail', 1020) }}"
                class="order-item order-card block"
                data-status="menunggu"
            >

                <div class="order-card-top">

                    <div class="flex items-start justify-between gap-3">

                        <div class="min-w-0">

                            <p class="order-number">
                                #SB1020
                            </p>

                            <p class="order-date">
                                30 Agustus 2026
                            </p>

                        </div>

                        <span class="order-status status-waiting">
                            Menunggu
                        </span>

                    </div>

                </div>


                <div class="order-card-body">

                    <p class="order-service">
                        Belanja Harian
                    </p>

                    <div class="order-detail">

                        <i class="fa-solid fa-user"></i>

                        <span>
                            Customer: Nisa
                        </span>

                    </div>

                    <div class="order-detail">

                        <i class="fa-solid fa-handshake"></i>

                        <span>
                            Mitra: Belum ada
                        </span>

                    </div>

                </div>


                <div class="order-card-footer">

                    <div>

                        <p class="order-price-label">
                            Total
                        </p>

                        <p class="order-price">
                            Rp100.000
                        </p>

                    </div>

                    <span class="detail-button">

                        Detail

                        <i class="fa-solid fa-chevron-right text-[7px]"></i>

                    </span>

                </div>

            </a>


            {{-- PESANAN 6 --}}
            <a
                href="{{ route('admin.pesanan.detail', 1019) }}"
                class="order-item order-card block"
                data-status="diproses"
            >

                <div class="order-card-top">

                    <div class="flex items-start justify-between gap-3">

                        <div class="min-w-0">

                            <p class="order-number">
                                #SB1019
                            </p>

                            <p class="order-date">
                                29 Agustus 2026
                            </p>

                        </div>

                        <span class="order-status status-process">
                            Diproses
                        </span>

                    </div>

                </div>


                <div class="order-card-body">

                    <p class="order-service">
                        Perbaikan Laptop
                    </p>

                    <div class="order-detail">

                        <i class="fa-solid fa-user"></i>

                        <span>
                            Customer: Fajar
                        </span>

                    </div>

                    <div class="order-detail">

                        <i class="fa-solid fa-handshake"></i>

                        <span>
                            Mitra: Deni
                        </span>

                    </div>

                </div>


                <div class="order-card-footer">

                    <div>

                        <p class="order-price-label">
                            Total
                        </p>

                        <p class="order-price">
                            Rp300.000
                        </p>

                    </div>

                    <span class="detail-button">

                        Detail

                        <i class="fa-solid fa-chevron-right text-[7px]"></i>

                    </span>

                </div>

            </a>


        </div>


        {{-- =================================================
        EMPTY STATE
        ================================================== --}}

        <div
            id="emptyState"
            class="empty-state hidden"
        >

            <div class="empty-icon">

                <i class="fa-regular fa-folder-open text-sm"></i>

            </div>

            <h3>
                Tidak ada pesanan
            </h3>

            <p>
                Belum ada pesanan pada kategori ini.
            </p>

        </div>

    </section>

</main>


@push('scripts')

<script>

function filterOrders(status) {

    const items =
        document.querySelectorAll('.order-item');

    const emptyState =
        document.getElementById('emptyState');

    const countElement =
        document.getElementById('visibleOrderCount');

    let visibleCount = 0;


    items.forEach(function(item) {

        const itemStatus =
            item.getAttribute('data-status');


        if (
            status === 'semua' ||
            itemStatus === status
        ) {

            item.classList.remove('hidden');

            visibleCount++;

        } else {

            item.classList.add('hidden');

        }

    });


    if (visibleCount === 0) {

        emptyState.classList.remove('hidden');

    } else {

        emptyState.classList.add('hidden');

    }


    countElement.textContent =
        visibleCount + ' Pesanan';

}

</script>

@endpush

@endsection