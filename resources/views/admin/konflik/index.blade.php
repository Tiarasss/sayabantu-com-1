@extends('layouts.admin')

@section('title', 'Pusat Konflik - SayaBantu.com')
@section('back-url', route('admin.dashboard'))
@section('back-text', 'Kembali ke Dashboard')
@section('page-title', 'Pusat Konflik')
@section('page-subtitle', 'Mediasi & Penyelesaian Masalah')

{{-- =========================================================
     TOP HERO AREA
========================================================= --}}
@section('hero')
<div class="px-5 pt-1 pb-5">
    {{-- SUMMARY STATS KONFLIK --}}
    <div class="p-4 rounded-[22px] bg-white/[0.08] backdrop-blur-md border border-white/15 shadow-xl">
        <div class="flex items-center justify-between mb-3 pb-2.5 border-b border-white/10">
            <span class="text-xs font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation text-rose-400"></i>
                Status Penanganan Masalah
            </span>
            <span class="text-[9px] font-semibold px-2 py-0.5 rounded-full bg-rose-500/20 text-rose-300 border border-rose-500/30">
                2 Kasus Aktif
            </span>
        </div>

        <div class="grid grid-cols-3 gap-2 text-center">
            <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] transition-colors" onclick="filterKonflik('butuh_aksi', this)">
                <div class="text-sm font-black text-rose-400">2</div>
                <div class="text-[9px] text-gray-300 mt-0.5">Butuh Aksi</div>
            </div>
            <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] transition-colors" onclick="filterKonflik('investigasi', this)">
                <div class="text-sm font-black text-amber-400">1</div>
                <div class="text-[9px] text-gray-300 mt-0.5">Investigasi</div>
            </div>
            <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] transition-colors" onclick="filterKonflik('selesai', this)">
                <div class="text-sm font-black text-emerald-400">14</div>
                <div class="text-[9px] text-gray-300 mt-0.5">Selesai Damai</div>
            </div>
        </div>
    </div>

    {{-- FILTER TABS (DITENGAHKAN SAMA RATA KIRI KANAN) --}}
    <div class="flex items-center justify-center gap-1.5 mt-3 flex-wrap text-[10px]">
        <button type="button" class="konflik-filter-tab active px-3.5 py-1.5 rounded-full font-semibold transition-all bg-[#173B67] text-white border border-sky-400/40" onclick="filterKonflik('all', this)">
            Semua (<span id="konflikCount">3</span>)
        </button>
        <button type="button" class="konflik-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterKonflik('butuh_aksi', this)">
            Butuh Aksi (2)
        </button>
        <button type="button" class="konflik-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterKonflik('investigasi', this)">
            Investigasi (1)
        </button>
        <button type="button" class="konflik-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterKonflik('selesai', this)">
            Selesai (1)
        </button>
    </div>
</div>
@endsection

{{-- =========================================================
     CONTENT AREA
========================================================= --}}
@section('content')
<div class="space-y-3">

    {{-- KASUS 1 --}}
    <div class="konflik-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3" data-status="butuh_aksi">
        <div class="flex items-start justify-between gap-2 pb-2.5 border-b border-gray-100">
            <div>
                <div class="flex items-center gap-2">
                    <span class="font-mono text-xs font-bold text-sky-800">#KF-104</span>
                    <span class="text-[9px] px-2 py-0.5 rounded-full font-bold bg-rose-50 text-rose-600 border border-rose-200">
                        Butuh Mediasi Segera
                    </span>
                </div>
                <p class="text-[10px] text-gray-400 mt-0.5">Pesanan #SB1022 • Servis AC Split</p>
            </div>
            <span class="text-[9px] text-gray-400 shrink-0">1 jam lalu</span>
        </div>

        <div class="grid grid-cols-2 gap-2 text-xs bg-gray-50 p-2.5 rounded-xl border border-gray-100">
            <div>
                <span class="text-[9px] text-gray-400 block font-semibold">CUSTOMER</span>
                <span class="font-bold text-gray-800">Dimas Pratama</span>
                <span class="text-[9px] text-gray-500 block">+62 812-3344-5566</span>
            </div>
            <div>
                <span class="text-[9px] text-gray-400 block font-semibold">MITRA PENYEDIA</span>
                <span class="font-bold text-gray-800">Agus Prasetyo</span>
                <span class="text-[9px] text-gray-500 block">Kategori Service AC</span>
            </div>
        </div>

        <div>
            <p class="text-[11px] text-gray-700 leading-snug">
                <strong class="text-gray-900">Kronologi:</strong> Mitra terlambat datang 45 menit dan meminta tambahan biaya transportasi Rp 50.000 di luar kesepakatan aplikasi SayaBantu.
            </p>
        </div>

        <div class="pt-1 flex items-center gap-2">
            <button type="button" onclick="showToast('Hubungi Pihak', 'Membuka chat mediasi antara customer Dimas dan mitra Agus.', 'info')" class="flex-1 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition-colors flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-comments text-xs"></i> Mediasi Chat
            </button>
            <button type="button" onclick="resolveKonflik(this, 'KF-104')" class="flex-1 py-2 rounded-xl bg-[#173B67] hover:bg-[#1E4E8C] active:scale-95 text-white text-xs font-bold transition-all shadow-sm flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-check text-xs"></i> Selesaikan
            </button>
        </div>
    </div>

    {{-- KASUS 2 --}}
    <div class="konflik-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3" data-status="investigasi">
        <div class="flex items-start justify-between gap-2 pb-2.5 border-b border-gray-100">
            <div>
                <div class="flex items-center gap-2">
                    <span class="font-mono text-xs font-bold text-sky-800">#KF-103</span>
                    <span class="text-[9px] px-2 py-0.5 rounded-full font-bold bg-amber-50 text-amber-700 border border-amber-200">
                        Sedang Investigasi
                    </span>
                </div>
                <p class="text-[10px] text-gray-400 mt-0.5">Pesanan #SB1018 • Full Home Cleaning</p>
            </div>
            <span class="text-[9px] text-gray-400 shrink-0">4 jam lalu</span>
        </div>

        <div class="grid grid-cols-2 gap-2 text-xs bg-gray-50 p-2.5 rounded-xl border border-gray-100">
            <div>
                <span class="text-[9px] text-gray-400 block font-semibold">CUSTOMER</span>
                <span class="font-bold text-gray-800">Ibu Ratna</span>
                <span class="text-[9px] text-gray-500 block">Jakarta Pusat</span>
            </div>
            <div>
                <span class="text-[9px] text-gray-400 block font-semibold">MITRA PENYEDIA</span>
                <span class="font-bold text-gray-800">Siti Rahmawati</span>
                <span class="text-[9px] text-gray-500 block">Home Cleaner Terverifikasi</span>
            </div>
        </div>

        <div>
            <p class="text-[11px] text-gray-700 leading-snug">
                <strong class="text-gray-900">Kronologi:</strong> Customer mengeluhkan area dapur belum bersih sempurna namun mitra terburu-buru menandai order selesai.
            </p>
        </div>

        <div class="pt-1 flex items-center gap-2">
            <button type="button" onclick="showToast('Bukti Foto', 'Menampilkan 3 foto perbandingan sebelum dan sesudah pekerjaan.', 'info')" class="flex-1 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition-colors flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-image text-xs"></i> Cek Foto
            </button>
            <button type="button" onclick="resolveKonflik(this, 'KF-103')" class="flex-1 py-2 rounded-xl bg-[#173B67] hover:bg-[#1E4E8C] active:scale-95 text-white text-xs font-bold transition-all shadow-sm flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-handshake text-xs"></i> Solusi Mediasi
            </button>
        </div>
    </div>

    {{-- KASUS 3 (SELESAI) --}}
    <div class="konflik-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 opacity-80" data-status="selesai">
        <div class="flex items-start justify-between gap-2 pb-2.5 border-b border-gray-100">
            <div>
                <div class="flex items-center gap-2">
                    <span class="font-mono text-xs font-bold text-gray-600">#KF-102</span>
                    <span class="text-[9px] px-2 py-0.5 rounded-full font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        Mediasi Selesai
                    </span>
                </div>
                <p class="text-[10px] text-gray-400 mt-0.5">Pesanan #SB1012 • Angkut Barang</p>
            </div>
            <span class="text-[9px] text-gray-400 shrink-0">Kemarin</span>
        </div>

        <p class="text-[11px] text-gray-600 leading-snug">
            <strong class="text-emerald-700">Hasil:</strong> Telah disepakati pemberian diskon kompensasi 15% untuk customer dan mitra bersedia memperbaiki estimasi kedatangan. Kasus ditutup damai.
        </p>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function filterKonflik(status, btn) {
        document.querySelectorAll('.konflik-filter-tab').forEach(b => {
            b.classList.remove('active', 'bg-[#173B67]', 'text-white', 'border', 'border-sky-400/40', 'font-semibold');
            b.classList.add('bg-white/10', 'text-gray-300');
        });
        if (btn) {
            btn.classList.add('active', 'bg-[#173B67]', 'text-white', 'border', 'border-sky-400/40', 'font-semibold');
            btn.classList.remove('bg-white/10', 'text-gray-300');
        }

        const cards = document.querySelectorAll('.konflik-card');
        let count = 0;
        cards.forEach(card => {
            const cardStatus = card.getAttribute('data-status');
            if (status === 'all' || cardStatus === status) {
                card.style.display = 'block';
                count++;
            } else {
                card.style.display = 'none';
            }
        });
        const countEl = document.getElementById('konflikCount');
        if (countEl) countEl.innerText = count;
    }

    function resolveKonflik(btn, id) {
        const card = btn.closest('.konflik-card');
        if (!card) return;
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Menyimpan...';
        setTimeout(() => {
            card.setAttribute('data-status', 'selesai');
            card.style.opacity = '0.8';
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Selesai';
            showToast('Mediasi Berhasil', 'Tiket #' + id + ' telah berhasil ditandai selesai damai.', 'success');
        }, 600);
    }
</script>
@endpush