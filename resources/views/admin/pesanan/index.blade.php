@extends('layouts.admin')

@section('title', 'Pesanan - SayaBantu.com')
@section('page-title', 'Pesanan')
@section('page-subtitle', 'Kelola dan pantau seluruh pesanan SayaBantu.com')

{{-- =========================================================
HERO AREA (DI DALAM TOP GRADIENT UNIFORM)
========================================================= --}}
@section('hero')

    {{-- SUMMARY (5 CARD SEJAJAR) --}}
    <section class="pesanan-summary">
        <div class="summary-grid">
            {{-- SEMUA --}}
            <div class="summary-card summary-blue cursor-pointer hover:scale-105 active:scale-95 transition-transform" onclick="filterOrders('semua')" title="Lihat Semua Pesanan" data-summary="semua">
                <span class="summary-label">Semua</span>
                <span class="summary-number">6</span>
            </div>

            {{-- MENUNGGU --}}
            <div class="summary-card summary-yellow cursor-pointer hover:scale-105 active:scale-95 transition-transform" onclick="filterOrders('menunggu')" title="Filter Pesanan Menunggu" data-summary="menunggu">
                <span class="summary-label">Menunggu</span>
                <span class="summary-number">2</span>
            </div>

            {{-- DIPROSES --}}
            <div class="summary-card summary-orange cursor-pointer hover:scale-105 active:scale-95 transition-transform" onclick="filterOrders('diproses')" title="Filter Pesanan Diproses" data-summary="diproses">
                <span class="summary-label">Diproses</span>
                <span class="summary-number">2</span>
            </div>

            {{-- SELESAI --}}
            <div class="summary-card summary-green cursor-pointer hover:scale-105 active:scale-95 transition-transform" onclick="filterOrders('selesai')" title="Filter Pesanan Selesai" data-summary="selesai">
                <span class="summary-label">Selesai</span>
                <span class="summary-number">1</span>
            </div>

            {{-- KONFLIK --}}
            <div class="summary-card summary-red cursor-pointer hover:scale-105 active:scale-95 transition-transform" onclick="filterOrders('konflik')" title="Filter Pesanan Konflik" data-summary="konflik">
                <span class="summary-label">Konflik</span>
                <span class="summary-number">1</span>
            </div>
        </div>
    </section>

    {{-- FILTER TABS --}}
    <section class="pesanan-filter">
        <div class="pesanan-filter-inner">
            <button type="button" onclick="filterOrders('semua', this)" class="filter-item active" data-filter="semua">
                Semua
            </button>
            <button type="button" onclick="filterOrders('menunggu', this)" class="filter-item" data-filter="menunggu">
                Menunggu
            </button>
            <button type="button" onclick="filterOrders('diproses', this)" class="filter-item" data-filter="diproses">
                Diproses
            </button>
            <button type="button" onclick="filterOrders('selesai', this)" class="filter-item" data-filter="selesai">
                Selesai
            </button>
            <button type="button" onclick="filterOrders('konflik', this)" class="filter-item" data-filter="konflik">
                Konflik
            </button>
        </div>
    </section>

@endsection

@section('content')

<div class="pesanan-main">

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

</div>


@push('scripts')

<script>
function filterOrders(status, btnEl) {
    // 1. Update filter tab button active state
    document.querySelectorAll('.filter-item').forEach(function(btn) {
        btn.classList.remove('active');
    });

    if (btnEl) {
        btnEl.classList.add('active');
    } else {
        const targetBtn = document.querySelector('.filter-item[data-filter="' + status + '"]');
        if (targetBtn) {
            targetBtn.classList.add('active');
        }
    }

    // Highlight matching summary card
    document.querySelectorAll('.summary-card').forEach(function(card) {
        card.style.outline = 'none';
        card.style.boxShadow = '';
    });
    const targetSummary = document.querySelector('.summary-card[data-summary="' + status + '"]');
    if (targetSummary) {
        targetSummary.style.outline = '2px solid rgba(255, 255, 255, 0.9)';
        targetSummary.style.boxShadow = '0 0 12px rgba(255, 255, 255, 0.35)';
    }

    // 2. Filter order cards
    const items = document.querySelectorAll('.order-item');
    const emptyState = document.getElementById('emptyState');
    const countElement = document.getElementById('visibleOrderCount');
    let visibleCount = 0;

    items.forEach(function(item) {
        const itemStatus = item.getAttribute('data-status');
        if (status === 'semua' || status === 'all' || itemStatus === status) {
            item.style.display = 'block';
            visibleCount++;
        } else {
            item.style.display = 'none';
        }
    });

    // 3. Update count & empty state
    if (visibleCount === 0) {
        if (emptyState) emptyState.classList.remove('hidden');
    } else {
        if (emptyState) emptyState.classList.add('hidden');
    }

    if (countElement) {
        countElement.textContent = visibleCount + ' Pesanan';
    }
}

// Auto filter on page load if query parameter exists
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const statusParam = urlParams.get('status');
    if (statusParam) {
        filterOrders(statusParam);
    }
});
</script>

@endpush

@endsection