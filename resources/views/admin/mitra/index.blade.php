@extends('layouts.admin')

@section('title', 'Data Mitra - SayaBantu.com')
@section('back-url', route('admin.dashboard'))
@section('back-text', 'Kembali ke Dashboard')
@section('page-title', 'Data Mitra')
@section('page-subtitle', 'Kelola Seluruh Penyedia Jasa')

{{-- =========================================================
     TOP HERO AREA
========================================================= --}}
@section('hero')
<div class="px-5 pt-1 pb-5">
    {{-- SUMMARY STATS MITRA --}}
    <div class="p-4 rounded-[22px] bg-white/[0.08] backdrop-blur-md border border-white/15 shadow-xl">
        <div class="flex items-center justify-between mb-3 pb-2.5 border-b border-white/10">
            <span class="text-xs font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-handshake-angle text-teal-400"></i>
                Total Penyedia Terdaftar
            </span>
            <span class="text-[9px] font-semibold px-2 py-0.5 rounded-full bg-teal-500/20 text-teal-300 border border-teal-500/30">
                48 Mitra
            </span>
        </div>

        <div class="grid grid-cols-3 gap-2 text-center">
            <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] transition-colors" onclick="filterMitra('aktif', this)">
                <div class="text-sm font-black text-emerald-400">42</div>
                <div class="text-[9px] text-gray-300 mt-0.5">Aktif Kerja</div>
            </div>
            <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] transition-colors" onclick="filterMitra('verifikasi', this)">
                <div class="text-sm font-black text-amber-400">4</div>
                <div class="text-[9px] text-gray-300 mt-0.5">Verifikasi</div>
            </div>
            <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] transition-colors" onclick="filterMitra('suspend', this)">
                <div class="text-sm font-black text-rose-400">2</div>
                <div class="text-[9px] text-gray-300 mt-0.5">Suspend</div>
            </div>
        </div>
    </div>

    {{-- FILTER TABS (DITENGAHKAN SAMA RATA KIRI KANAN) --}}
    <div class="mitra-filter-tabs flex items-center justify-center gap-1.5 mt-3 text-[10px]">
        <button type="button" class="mitra-filter-tab active px-3.5 py-1.5 rounded-full font-semibold transition-all bg-[#173B67] text-white border border-sky-400/40" onclick="filterMitra('all', this)">
            Semua (<span id="mitraCount">4</span>)
        </button>
        <button type="button" class="mitra-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterMitra('aktif', this)">
            Aktif (2)
        </button>
        <button type="button" class="mitra-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterMitra('verifikasi', this)">
            Verifikasi (1)
        </button>
        <button type="button" class="mitra-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterMitra('suspend', this)">
            Ditinjau (1)
        </button>
    </div>
</div>
@endsection

{{-- =========================================================
     CONTENT AREA
========================================================= --}}
@section('content')
<div class="space-y-3">

    {{-- MITRA 1 --}}
    <div class="mitra-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3" data-status="aktif">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-11 h-11 rounded-2xl bg-sky-50 text-[#173B67] font-bold text-base flex items-center justify-center border border-sky-100 shrink-0">
                    B
                </div>
                <div class="min-w-0">
                    <div class="flex items-center gap-1.5">
                        <h3 class="text-xs font-bold text-gray-900 truncate">Budi Santoso</h3>
                        <i class="fa-solid fa-circle-check text-sky-600 text-[10px]"></i>
                    </div>
                    <p class="text-[10px] text-gray-500">Cleaning Service • Jakarta Selatan</p>
                    <div class="flex items-center gap-2 mt-0.5">
                        <span class="text-[9px] font-bold text-amber-600 flex items-center gap-0.5">
                            <i class="fa-solid fa-star text-[8px]"></i> 4.9 (128 order)
                        </span>
                    </div>
                </div>
            </div>
            <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                Aktif
            </span>
        </div>

        <div class="flex items-center justify-between pt-2 border-t border-gray-100 text-xs">
            <span class="text-[10px] text-gray-400">Bergabung sejak Feb 2026</span>
            <div class="flex items-center gap-1.5">
                <button type="button" onclick="showToast('WhatsApp Mitra', 'Membuka kontak WhatsApp Budi Santoso (+62 812-3456-7890)', 'info')" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-[10px] hover:bg-emerald-100 transition-colors">
                    <i class="fa-brands fa-whatsapp"></i> Chat
                </button>
                <button type="button" onclick="showToast('Detail Mitra', 'Membuka berkas rekam jejak Budi Santoso.', 'info')" class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors">
                    Detail
                </button>
            </div>
        </div>
    </div>

    {{-- MITRA 2 --}}
    <div class="mitra-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3" data-status="verifikasi">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-11 h-11 rounded-2xl bg-amber-50 text-amber-700 font-bold text-base flex items-center justify-center border border-amber-100 shrink-0">
                    S
                </div>
                <div class="min-w-0">
                    <div class="flex items-center gap-1.5">
                        <h3 class="text-xs font-bold text-gray-900 truncate">Siti Rahmawati</h3>
                        <span class="text-[8px] px-1.5 py-0.2 rounded bg-amber-100 text-amber-800 font-bold">BARU</span>
                    </div>
                    <p class="text-[10px] text-gray-500">Home Cleaner • Jakarta Pusat</p>
                    <p class="text-[9px] text-amber-700 font-medium mt-0.5">KTP & SKCK diunggah 3 jam lalu</p>
                </div>
            </div>
            <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-amber-50 text-amber-700 border border-amber-200 shrink-0">
                Verifikasi
            </span>
        </div>

        <div class="flex items-center justify-between pt-2 border-t border-gray-100 text-xs">
            <span class="text-[10px] text-gray-400">Dokumen Lengkap (2/2)</span>
            <div class="flex items-center gap-1.5">
                <button type="button" onclick="showToast('Periksa KTP & SKCK', 'KTP NIK 3171xxxxxxxx dan SKCK Polri valid.', 'info')" class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors">
                    <i class="fa-solid fa-file-shield"></i> Cek Berkas
                </button>
                <button type="button" onclick="verifyMitra(this, 'Siti Rahmawati')" class="px-2.5 py-1 rounded-lg bg-[#173B67] hover:bg-[#1E4E8C] text-white font-bold text-[10px] transition-colors shadow-sm">
                    <i class="fa-solid fa-check"></i> Setujui
                </button>
            </div>
        </div>
    </div>

    {{-- MITRA 3 --}}
    <div class="mitra-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3" data-status="aktif">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-11 h-11 rounded-2xl bg-sky-50 text-[#173B67] font-bold text-base flex items-center justify-center border border-sky-100 shrink-0">
                    R
                </div>
                <div class="min-w-0">
                    <div class="flex items-center gap-1.5">
                        <h3 class="text-xs font-bold text-gray-900 truncate">Rian Hidayat</h3>
                        <i class="fa-solid fa-circle-check text-sky-600 text-[10px]"></i>
                    </div>
                    <p class="text-[10px] text-gray-500">Angkut Barang • Jakarta Barat</p>
                    <span class="text-[9px] font-bold text-amber-600 flex items-center gap-0.5 mt-0.5">
                        <i class="fa-solid fa-star text-[8px]"></i> 4.8 (89 order)
                    </span>
                </div>
            </div>
            <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                Aktif
            </span>
        </div>

        <div class="flex items-center justify-between pt-2 border-t border-gray-100 text-xs">
            <span class="text-[10px] text-gray-400">Armada Pickup Box</span>
            <div class="flex items-center gap-1.5">
                <button type="button" onclick="showToast('WhatsApp Mitra', 'Membuka kontak WhatsApp Rian Hidayat', 'info')" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-[10px] hover:bg-emerald-100 transition-colors">
                    <i class="fa-brands fa-whatsapp"></i> Chat
                </button>
                <button type="button" onclick="showToast('Detail Mitra', 'Membuka data armada Rian Hidayat.', 'info')" class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors">
                    Detail
                </button>
            </div>
        </div>
    </div>

    {{-- MITRA 4 --}}
    <div class="mitra-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3" data-status="suspend">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-11 h-11 rounded-2xl bg-rose-50 text-rose-700 font-bold text-base flex items-center justify-center border border-rose-100 shrink-0">
                    A
                </div>
                <div class="min-w-0">
                    <div class="flex items-center gap-1.5">
                        <h3 class="text-xs font-bold text-gray-900 truncate">Agus Prasetyo</h3>
                        <span class="text-[8px] px-1.5 py-0.2 rounded bg-rose-100 text-rose-800 font-bold">MEDIASI</span>
                    </div>
                    <p class="text-[10px] text-gray-500">Service AC Split • Jakarta Timur</p>
                    <span class="text-[9px] font-bold text-rose-600 flex items-center gap-0.5 mt-0.5">
                        Tiket Konflik #KF-104 terbuka
                    </span>
                </div>
            </div>
            <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-rose-50 text-rose-700 border border-rose-200 shrink-0">
                Ditinjau
            </span>
        </div>

        <div class="flex items-center justify-between pt-2 border-t border-gray-100 text-xs">
            <span class="text-[10px] text-gray-400">Ditangguhkan Sementara</span>
            <div class="flex items-center gap-1.5">
                <a href="{{ route('admin.konflik') }}" class="px-2.5 py-1 rounded-lg bg-rose-50 text-rose-700 font-bold text-[10px] hover:bg-rose-100 transition-colors">
                    Lihat Kasus
                </a>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function filterMitra(status, btn) {
        document.querySelectorAll('.mitra-filter-tab').forEach(b => {
            b.classList.remove('active', 'bg-[#173B67]', 'text-white', 'border', 'border-sky-400/40', 'font-semibold');
            b.classList.add('bg-white/10', 'text-gray-300');
        });
        if (btn) {
            btn.classList.add('active', 'bg-[#173B67]', 'text-white', 'border', 'border-sky-400/40', 'font-semibold');
            btn.classList.remove('bg-white/10', 'text-gray-300');
        }

        const cards = document.querySelectorAll('.mitra-card');
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
        const countEl = document.getElementById('mitraCount');
        if (countEl) countEl.innerText = count;
    }

    function verifyMitra(btn, name) {
        const card = btn.closest('.mitra-card');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i>';
        setTimeout(() => {
            if (card) {
                card.setAttribute('data-status', 'aktif');
                const badge = card.querySelector('.bg-amber-50');
                if (badge) {
                    badge.className = 'px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0';
                    badge.innerText = 'Aktif';
                }
            }
            btn.parentElement.innerHTML = '<span class="text-emerald-600 font-bold text-[10px] flex items-center gap-1"><i class="fa-solid fa-check"></i> Terverifikasi</span>';
            showToast('Mitra Diverifikasi', 'Akun mitra ' + name + ' berhasil disetujui dan dapat menerima pesanan.', 'success');
        }, 700);
    }
</script>
@endpush
