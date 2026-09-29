@extends('layouts.admin')

@section('title', 'Admin Dashboard - SayaBantu.com')
@section('page-title', 'Ringkasan Aktivitas')
@section('page-subtitle', 'Pantau seluruh aktivitas SayaBantu.com secara live')
@section('page-badge')
<div class="flex items-center gap-1.5">
    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[8.5px] font-semibold border border-emerald-400/30">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
        Auto-sync
    </span>
</div>
@endsection

{{-- =========================================================
     HERO AREA: STATISTIK REALTIME & SIMULASI
========================================================= --}}
@section('hero')
<section class="px-5 pt-1 pb-4">

    {{-- =================================================
         STAT CARDS (REALTIME DATA BINDING)
    ================================================== --}}
    <div class="grid grid-cols-2 gap-3">

        {{-- PESANAN --}}
        <div
            class="stat-card cursor-pointer hover:scale-[1.02] active:scale-[0.98] transition-all"
            onclick="window.location.href='{{ route('admin.pesanan') }}'"
            title="Kelola Pesanan"
        >
            <div class="stat-decoration bg-blue-50"></div>

            <div class="relative flex items-start justify-between">
                <div class="icon-box icon-blue">
                    <i class="fa-solid fa-file-lines text-sm"></i>
                </div>
                <span class="rounded-full bg-green-50 px-2 py-1 text-[8px] font-semibold text-green-600" data-rt-stat="pesanan_growth">
                    {{ $stats['pesanan_growth'] ?? '+12%' }}
                </span>
            </div>

            <div class="relative mt-3">
                <p class="text-[10px] font-medium text-gray-500">Pesanan</p>
                <p class="mt-1 text-[20px] font-bold leading-none text-gray-900 transition-transform" data-rt-stat="total_pesanan">
                    {{ $stats['total_pesanan'] ?? $totalPesanan ?? 0 }}
                </p>
                <p class="mt-1.5 text-[8px] text-gray-400">pantauan live</p>
            </div>
        </div>

        {{-- PEMBAYARAN --}}
        <div
            class="stat-card cursor-pointer hover:scale-[1.02] active:scale-[0.98] transition-all"
            onclick="window.location.href='{{ route('admin.pembayaran') }}'"
            title="Data Pembayaran"
        >
            <div class="stat-decoration bg-green-50"></div>

            <div class="relative flex items-start justify-between">
                <div class="icon-box icon-green">
                    <i class="fa-solid fa-credit-card text-sm"></i>
                </div>
                <span class="rounded-full bg-green-50 px-2 py-1 text-[8px] font-semibold text-green-600">
                    Aktif
                </span>
            </div>

            <div class="relative mt-3">
                <p class="text-[10px] font-medium text-gray-500">Pembayaran</p>
                <p class="mt-1 text-[20px] font-bold leading-none text-gray-900 transition-transform" data-rt-stat="total_pembayaran">
                    {{ $stats['total_pembayaran'] ?? $totalPembayaran ?? 0 }}
                </p>
                <p class="mt-1.5 text-[8px] text-gray-400">transaksi tercatat</p>
            </div>
        </div>

        {{-- PENGGUNA --}}
        <div
            class="stat-card cursor-pointer hover:scale-[1.02] active:scale-[0.98] transition-all"
            onclick="window.location.href='{{ route('admin.pengguna') }}'"
            title="Data Pengguna"
        >
            <div class="stat-decoration bg-amber-50"></div>

            <div class="relative flex items-start justify-between">
                <div class="icon-box icon-amber">
                    <i class="fa-solid fa-users text-sm"></i>
                </div>
                <span class="rounded-full bg-gray-100 px-2 py-1 text-[8px] font-semibold text-gray-500">
                    Total
                </span>
            </div>

            <div class="relative mt-3">
                <p class="text-[10px] font-medium text-gray-500">Pengguna</p>
                <p class="mt-1 text-[20px] font-bold leading-none text-gray-900 transition-transform" data-rt-stat="total_pengguna">
                    {{ $stats['total_pengguna'] ?? $totalPengguna ?? 0 }}
                </p>
                <p class="mt-1.5 text-[8px] text-gray-400">akun aktif</p>
            </div>
        </div>

        {{-- KONFLIK --}}
        <div
            class="stat-card cursor-pointer hover:scale-[1.02] active:scale-[0.98] transition-all"
            onclick="window.location.href='{{ route('admin.konflik') }}'"
            title="Pusat Mediasi"
        >
            <div class="stat-decoration bg-red-50"></div>

            <div class="relative flex items-start justify-between">
                <div class="icon-box icon-red">
                    <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                </div>
                <span class="rounded-full bg-red-50 px-2 py-1 text-[8px] font-semibold text-red-500">
                    Perlu cek
                </span>
            </div>

            <div class="relative mt-3">
                <p class="text-[10px] font-medium text-gray-500">Konflik</p>
                <p class="mt-1 text-[20px] font-bold leading-none text-gray-900 transition-transform" data-rt-stat="total_konflik">
                    {{ $stats['total_konflik'] ?? $totalKonflik ?? 0 }}
                </p>
                <p class="mt-1.5 text-[8px] text-gray-400">perlu atensi</p>
            </div>
        </div>

    </div>

</section>
@endsection

{{-- =========================================================
     KONTEN DASHBOARD: PESANAN & AKTIVITAS REALTIME
========================================================= --}}
@section('content')

{{-- PESANAN TERBARU --}}
<section class="pt-0">
    <div class="mb-3 flex items-center justify-between">
        <div>
            <h2 class="section-title flex items-center gap-1.5">
                Pesanan Terbaru
                <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-ping"></span>
            </h2>
            <p class="mt-0.5 text-[9px] text-gray-400">
                Data terhubung secara live tanpa perlu refresh
            </p>
        </div>

        <a href="{{ route('admin.pesanan') }}" class="section-link">
            Lihat semua
        </a>
    </div>

    {{-- CONTAINER PESANAN TERBARU (LIVE SYNC) --}}
    <div id="sbRecentOrdersContainer" class="pesanan-card">
        @forelse($recentOrders as $index => $item)
            <div
                class="pesanan-item flex cursor-pointer items-center gap-3 p-3.5 hover:bg-gray-50/80 active:scale-[0.99] transition-all"
                onclick="window.location.href='{{ route('admin.pesanan.detail', $item['id']) }}'"
                title="Lihat Detail Pesanan {{ $item['id'] }}"
            >
                <div class="icon-box {{ $item['icon_class'] ?? 'icon-blue' }} shrink-0">
                    <i class="fa-solid {{ $item['icon'] ?? 'fa-file-lines' }} text-sm"></i>
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="truncate text-xs font-semibold text-gray-900 leading-tight">
                            {{ $item['service'] }}
                        </h3>
                        <span class="status {{ $item['status_class'] ?? 'status-warning' }} shrink-0">
                            {{ $item['status'] }}
                        </span>
                    </div>

                    <div class="mt-1 flex items-center justify-between text-[9px] text-gray-400">
                        <span>Pesanan #{{ $item['id'] }}</span>
                        <span class="font-semibold text-gray-600">{{ $item['amount'] }}</span>
                    </div>

                    <div class="mt-1 flex items-center gap-1.5 text-[8.5px] text-gray-400">
                        <i class="fa-regular fa-clock text-[8px]"></i>
                        <span>{{ $item['created_at'] ?? 'Baru saja' }}</span>
                    </div>
                </div>

                <i class="fa-solid fa-chevron-right text-[9px] text-gray-300"></i>
            </div>

            @if(!$loop->last && $loop->index < 3)
                <div class="h-px bg-gray-100"></div>
            @endif
        @empty
            <div class="p-6 text-center text-gray-400 text-xs">
                Belum ada pesanan terbaru.
            </div>
        @endforelse
    </div>
</section>

{{-- AKTIVITAS TERBARU --}}
<section class="mt-5">
    <div class="mb-3 flex items-center justify-between">
        <div>
            <h2 class="section-title">
                Aktivitas Terbaru
            </h2>
            <p class="mt-0.5 text-[9px] text-gray-400">
                Log aktivitas sistem waktu-nyata
            </p>
        </div>

        <span class="flex items-center gap-1.5 text-[9px] font-medium text-emerald-600">
            <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-500"></span>
            Live Stream
        </span>
    </div>

    {{-- CONTAINER AKTIVITAS TERBARU (LIVE SYNC) --}}
    <div id="sbRecentActivitiesContainer" class="admin-card p-4">
        @forelse($recentActivities as $index => $act)
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full {{ $act['color_class'] ?? 'bg-blue-50 text-blue-600' }} shadow-sm">
                    <i class="fa-solid {{ $act['icon'] ?? 'fa-bell' }} text-[11px]"></i>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-[10px] font-semibold text-gray-800 leading-tight truncate">
                        {{ $act['title'] }}
                    </p>
                    <p class="mt-0.5 text-[9px] text-gray-400 truncate">
                        {{ $act['subtitle'] ?? '' }}
                    </p>
                </div>

                <span class="text-[8px] text-gray-400 font-medium shrink-0">
                    {{ $act['time'] ?? '1m' }}
                </span>
            </div>

            @if(!$loop->last && $loop->index < 3)
                <div class="my-3 h-px bg-gray-100"></div>
            @endif
        @empty
            <div class="p-4 text-center text-gray-400 text-xs">
                Belum ada aktivitas.
            </div>
        @endforelse
    </div>
</section>

@endsection
