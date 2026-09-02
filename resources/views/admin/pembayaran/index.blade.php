@extends('layouts.admin-pembayaran')

@section('title', 'Pembayaran - SayaBantu.com')


{{-- =========================================================
     TOP AREA
========================================================= --}}

@section('page-top')

<div class="pembayaran-top-area">


    {{-- DECORATION --}}

    <div class="header-circle-one"></div>

    <div class="header-circle-two"></div>


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <header class="px-5 pt-4">

        <div class="header-content flex items-center w-full">


            {{-- BURGER --}}

            <button
                type="button"
                class="header-icon"
                aria-label="Menu"
            >

                <i class="fa-solid fa-bars text-[16px]"></i>

            </button>


            {{-- BRAND --}}

            <div class="ml-2 flex-1 min-w-0">

                <h1
                    class="
                        overflow-hidden
                        whitespace-nowrap
                        text-ellipsis
                        text-[17px]
                        font-bold
                        tracking-tight
                        text-white
                    "
                >
                    SayaBantu.com
                </h1>

            </div>


            {{-- NOTIFICATION --}}

            <button
                type="button"
                class="header-icon relative mr-[5px]"
                aria-label="Notifikasi"
            >

                <i class="fa-regular fa-bell text-[17px]"></i>

                <span class="notification-dot"></span>

            </button>


            {{-- PROFILE --}}

            <button
                type="button"
                class="profile-admin"
                aria-label="Profil Admin"
            >
                A
            </button>

        </div>

    </header>


    {{-- =====================================================
         HEADING
    ====================================================== --}}

    <section class="pembayaran-heading">

        <h2>
            Pembayaran
        </h2>

        <p>
            Pantau pembayaran dan kondisi dana SayaBantu.com.
        </p>

    </section>


    {{-- =====================================================
         SALDO ADMIN
    ====================================================== --}}

    <section class="pembayaran-balance">

        <div class="balance-card">

            <div class="balance-circle-one"></div>

            <div class="balance-circle-two"></div>


            <div class="balance-content">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="balance-label">
                            Saldo Admin
                        </p>

                        <p class="balance-subtitle">
                            Dana tersedia
                        </p>

                    </div>


                    <div
                        class="
                            flex
                            h-8
                            w-8
                            items-center
                            justify-center
                            rounded-full
                            bg-white/15
                            text-xs
                            font-bold
                        "
                    >
                        Rp
                    </div>

                </div>


                <p class="balance-value">
                    Rp8.450.000
                </p>


                <div class="balance-footer">

                    <p class="balance-description">
                        Dana yang dapat digunakan admin
                    </p>

                    <span class="balance-active">
                        Aktif
                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         RINGKASAN DANA
    ====================================================== --}}

    <section class="pembayaran-summary">

        <div class="summary-grid-payment">


            {{-- DANA DITAHAN --}}

            <div class="summary-payment-card summary-payment-yellow">

                <p class="summary-payment-label">
                    Dana Ditahan
                </p>

                <p class="summary-payment-number">
                    Rp2,15 jt
                </p>

                <p class="summary-payment-description text-yellow-700">
                    Belum dicairkan
                </p>

            </div>


            {{-- DANA MASUK --}}

            <div class="summary-payment-card summary-payment-green">

                <p class="summary-payment-label">
                    Dana Masuk
                </p>

                <p class="summary-payment-number">
                    Rp12,75 jt
                </p>

                <p class="summary-payment-description text-green-600">
                    Pembayaran berhasil
                </p>

            </div>


            {{-- DANA KELUAR --}}

            <div class="summary-payment-card summary-payment-blue">

                <p class="summary-payment-label">
                    Dana Keluar
                </p>

                <p class="summary-payment-number">
                    Rp4,30 jt
                </p>

                <p class="summary-payment-description text-blue-600">
                    Dibayarkan ke mitra
                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
         STATUS TRANSAKSI
    ====================================================== --}}

    <section class="pembayaran-status">

        <h3 class="pembayaran-status-title">
            Transaksi
        </h3>

        <p class="pembayaran-status-subtitle">
            Daftar pembayaran terbaru
        </p>


        <div class="status-payment-grid">


            {{-- MENUNGGU --}}

            <div class="status-payment-card">

                <p class="status-payment-label">
                    Menunggu
                </p>

                <p class="status-payment-number">
                    8
                </p>

            </div>


            {{-- BERHASIL --}}

            <div class="status-payment-card">

                <p class="status-payment-label">
                    Berhasil
                </p>

                <p class="status-payment-number">
                    32
                </p>

            </div>


            {{-- GAGAL --}}

            <div class="status-payment-card">

                <p class="status-payment-label">
                    Gagal
                </p>

                <p class="status-payment-number">
                    3
                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
         FILTER
    ====================================================== --}}

    <section class="pembayaran-filter">

        <div class="pembayaran-filter-inner">


            <button
                type="button"
                onclick="filterPayment('semua', this)"
                class="payment-filter active-filter"
            >
                Semua
            </button>


            <button
                type="button"
                onclick="filterPayment('menunggu', this)"
                class="payment-filter"
            >
                Menunggu
            </button>


            <button
                type="button"
                onclick="filterPayment('berhasil', this)"
                class="payment-filter"
            >
                Berhasil
            </button>


            <button
                type="button"
                onclick="filterPayment('gagal', this)"
                class="payment-filter"
            >
                Gagal
            </button>

        </div>

    </section>

</div>

@endsection



{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

@section('content')

<main class="pembayaran-main">


    {{-- =====================================================
         HEADER DAFTAR PEMBAYARAN
    ====================================================== --}}

    <div class="section-header-payment">

        <div>

            <h3 class="section-title-payment">
                Daftar Pembayaran
            </h3>

            <p class="mt-1 text-[8px] text-white">
                Klik pembayaran untuk melihat detail.
            </p>

        </div>


        <span
            id="visiblePaymentCount"
            class="section-count-payment"
        >
            4 Pembayaran
        </span>

    </div>


    {{-- =====================================================
         PAYMENT LIST
    ====================================================== --}}

    <div
        id="payment-list"
        class="space-y-3"
    >


        {{-- =================================================
             PAY1024
        ================================================== --}}

        <a
            href="{{ route('admin.pembayaran.detail', 'PAY1024') }}"
            data-status="menunggu"
            class="payment-item payment-card block"
        >

            <div class="payment-card-body">

                <div class="flex items-start justify-between gap-3">

                    <div>

                        <p class="payment-number">
                            #PAY1024
                        </p>

                        <p class="payment-order">
                            #SB1024 • Andi
                        </p>

                    </div>


                    <span class="payment-status-badge payment-status-waiting">
                        Menunggu
                    </span>

                </div>


                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3">

                    <div>

                        <p class="payment-method-label">
                            Metode
                        </p>

                        <p class="payment-method">
                            Transfer Bank
                        </p>

                    </div>


                    <div class="text-right">

                        <p class="payment-total-label">
                            Total
                        </p>

                        <p class="payment-total">
                            Rp140.000
                        </p>

                    </div>

                </div>

            </div>

        </a>


        {{-- =================================================
             PAY1023
        ================================================== --}}

        <a
            href="{{ route('admin.pembayaran.detail', 'PAY1023') }}"
            data-status="berhasil"
            class="payment-item payment-card block"
        >

            <div class="payment-card-body">

                <div class="flex items-start justify-between gap-3">

                    <div>

                        <p class="payment-number">
                            #PAY1023
                        </p>

                        <p class="payment-order">
                            #SB1023 • Sinta
                        </p>

                    </div>


                    <span class="payment-status-badge payment-status-success">
                        Berhasil
                    </span>

                </div>


                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3">

                    <div>

                        <p class="payment-method-label">
                            Metode
                        </p>

                        <p class="payment-method">
                            QRIS
                        </p>

                    </div>


                    <div class="text-right">

                        <p class="payment-total-label">
                            Total
                        </p>

                        <p class="payment-total">
                            Rp75.000
                        </p>

                    </div>

                </div>

            </div>

        </a>


        {{-- =================================================
             PAY1022
        ================================================== --}}

        <a
            href="{{ route('admin.pembayaran.detail', 'PAY1022') }}"
            data-status="berhasil"
            class="payment-item payment-card block"
        >

            <div class="payment-card-body">

                <div class="flex items-start justify-between gap-3">

                    <div>

                        <p class="payment-number">
                            #PAY1022
                        </p>

                        <p class="payment-order">
                            #SB1022 • Dimas
                        </p>

                    </div>


                    <span class="payment-status-badge payment-status-success">
                        Berhasil
                    </span>

                </div>


                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3">

                    <div>

                        <p class="payment-method-label">
                            Metode
                        </p>

                        <p class="payment-method">
                            E-Wallet
                        </p>

                    </div>


                    <div class="text-right">

                        <p class="payment-total-label">
                            Total
                        </p>

                        <p class="payment-total">
                            Rp250.000
                        </p>

                    </div>

                </div>

            </div>

        </a>


        {{-- =================================================
             PAY1021
        ================================================== --}}

        <a
            href="{{ route('admin.pembayaran.detail', 'PAY1021') }}"
            data-status="gagal"
            class="payment-item payment-card block"
        >

            <div class="payment-card-body">

                <div class="flex items-start justify-between gap-3">

                    <div>

                        <p class="payment-number">
                            #PAY1021
                        </p>

                        <p class="payment-order">
                            #SB1021 • Rina
                        </p>

                    </div>


                    <span class="payment-status-badge payment-status-failed">
                        Gagal
                    </span>

                </div>


                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3">

                    <div>

                        <p class="payment-method-label">
                            Metode
                        </p>

                        <p class="payment-method">
                            Transfer Bank
                        </p>

                    </div>


                    <div class="text-right">

                        <p class="payment-total-label">
                            Total
                        </p>

                        <p class="payment-total">
                            Rp120.000
                        </p>

                    </div>

                </div>

            </div>

        </a>


    </div>


    {{-- =====================================================
         EMPTY STATE
    ====================================================== --}}

    <div
        id="paymentEmptyState"
        class="hidden payment-empty-state"
    >

        <div class="payment-empty-icon">

            <i class="fa-regular fa-folder-open text-sm"></i>

        </div>

        <h3>
            Tidak ada pembayaran
        </h3>

        <p>
            Belum ada transaksi pada kategori ini.
        </p>

    </div>


</main>

@endsection



{{-- =========================================================
     SCRIPT FILTER
========================================================= --}}

@push('scripts')

<script>

function filterPayment(status, button) {

    const items =
        document.querySelectorAll('.payment-item');

    const buttons =
        document.querySelectorAll('.payment-filter');

    const countElement =
        document.getElementById('visiblePaymentCount');

    const emptyState =
        document.getElementById('paymentEmptyState');

    let visibleCount = 0;


    /* =====================================================
       RESET SEMUA FILTER
    ===================================================== */

    buttons.forEach(btn => {

        btn.classList.remove(
            'active-filter'
        );

    });


    /* =====================================================
       AKTIFKAN FILTER YANG DIPILIH
    ===================================================== */

    button.classList.add(
        'active-filter'
    );


    /* =====================================================
       FILTER PAYMENT
    ===================================================== */

    items.forEach(item => {

        const itemStatus =
            item.getAttribute('data-status');


        if (
            status === 'semua' ||
            itemStatus === status
        ) {

            item.style.display = 'block';

            visibleCount++;

        } else {

            item.style.display = 'none';

        }

    });


    /* =====================================================
       UPDATE JUMLAH
    ===================================================== */

    countElement.textContent =
        visibleCount + ' Pembayaran';


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    if (visibleCount === 0) {

        emptyState.classList.remove('hidden');

    } else {

        emptyState.classList.add('hidden');

    }

}

</script>

@endpush