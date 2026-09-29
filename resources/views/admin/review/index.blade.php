@extends('layouts.admin')

@section('title', 'Review dan Rating - SayaBantu.com')
@section('back-url', route('admin.dashboard'))
@section('back-text', 'Kembali ke Dashboard')
@section('page-title', 'Review dan Rating')
@section('page-subtitle', 'Ulasan dan Kepuasan Pelanggan')

{{-- =========================================================
     TOP HERO AREA
========================================================= --}}
@section('hero')
<div class="px-5 pt-1 pb-5">
    {{-- SUMMARY STATS REVIEW --}}
    <div class="p-4 rounded-[22px] bg-white/[0.08] backdrop-blur-md border border-white/15 shadow-xl">
        <div class="flex items-center justify-between mb-3 pb-2.5 border-b border-white/10">
            <span class="text-xs font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-star text-amber-400"></i>
                Skor Kepuasan Layanan
            </span>
            <span class="text-[9px] font-semibold px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                98% Puas
            </span>
        </div>

        <div class="grid grid-cols-4 gap-2 text-center">
            <div class="p-2 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] active:scale-95 transition-all" onclick="filterReview('all', this)" title="Rata-rata Rating">
                <div class="text-xs font-black text-amber-400 flex items-center justify-center gap-1">
                    4.8 <i class="fa-solid fa-star text-[9px]"></i>
                </div>
                <div class="text-[8px] text-gray-300 mt-0.5">Rata-rata</div>
            </div>
            <div class="p-2 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] active:scale-95 transition-all" onclick="filterReview('all', this)" title="Total Ulasan">
                <div class="text-xs font-black text-white">842</div>
                <div class="text-[8px] text-gray-300 mt-0.5">Ulasan</div>
            </div>
            <div class="p-2 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] active:scale-95 transition-all" onclick="filterReview('star5', this)" title="Bintang 5">
                <div class="text-xs font-black text-emerald-400">620</div>
                <div class="text-[8px] text-gray-300 mt-0.5">★ 5 Bintang</div>
            </div>
            <div class="p-2 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] active:scale-95 transition-all" onclick="filterReview('problem', this)" title="Keluhan">
                <div class="text-xs font-black text-rose-400">2</div>
                <div class="text-[8px] text-gray-300 mt-0.5">Keluhan</div>
            </div>
        </div>
    </div>

    {{-- FILTER TABS (DITENGAHKAN SAMA RATA KIRI KANAN) --}}
    <div class="flex items-center justify-center gap-1.5 mt-3 flex-wrap text-[10px]">
        <button type="button" class="review-filter-tab active px-3.5 py-1.5 rounded-full font-semibold transition-all bg-[#173B67] text-white border border-sky-400/40" onclick="filterReview('all', this)">
            Semua (<span id="reviewCount">4</span>)
        </button>
        <div class="relative">
            <button
                type="button"
                id="ratingFilterToggle"
                class="review-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20"
                onclick="toggleRatingFilters(this)"
                aria-expanded="false"
            >
                Bintang <i class="fa-solid fa-chevron-down ml-1 text-[8px]"></i>
            </button>
            <div id="ratingFilterOptions" class="hidden absolute z-20 top-full left-1/2 -translate-x-1/2 mt-1.5 p-1 rounded-xl bg-[#173B67] border border-sky-400/30 shadow-lg whitespace-nowrap">
                <button type="button" class="review-filter-tab px-2.5 py-1 rounded-lg font-medium text-[9px] text-gray-200 hover:bg-white/15" onclick="filterReview('star1', this)">1</button>
                <button type="button" class="review-filter-tab px-2.5 py-1 rounded-lg font-medium text-[9px] text-gray-200 hover:bg-white/15" onclick="filterReview('star2', this)">2</button>
                <button type="button" class="review-filter-tab px-2.5 py-1 rounded-lg font-medium text-[9px] text-gray-200 hover:bg-white/15" onclick="filterReview('star3', this)">3</button>
                <button type="button" class="review-filter-tab px-2.5 py-1 rounded-lg font-medium text-[9px] text-gray-200 hover:bg-white/15" onclick="filterReview('star4', this)">4</button>
                <button type="button" class="review-filter-tab px-2.5 py-1 rounded-lg font-medium text-[9px] text-gray-200 hover:bg-white/15" onclick="filterReview('star5', this)">5</button>
            </div>
        </div>
        <button type="button" class="review-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterReview('problem', this)">
            Perlu Ditindak (1)
        </button>
    </div>
</div>
@endsection

{{-- =========================================================
     CONTENT AREA
========================================================= --}}
@section('content')
<div class="space-y-3">

    {{-- INFO BAR --}}
    <div class="flex items-center justify-between px-1 text-xs">
        <span class="text-gray-500 font-medium">Ulasan Masuk Terbaru</span>
        <button type="button" onclick="showToast('Analisis Sentimen', 'Sentimen kepuasan pelanggan saat ini mencapai 97.4% positif.', 'info')" class="text-[10px] font-semibold text-[#173B67] hover:underline flex items-center gap-1">
            <i class="fa-solid fa-chart-pie text-[9px]"></i> Analisis Sentimen
        </button>
    </div>

    <div id="reviewList" class="space-y-3">

        {{-- REVIEW 1: Bintang 5 - Dimas Pratama to Budi Santoso --}}
        <div class="review-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 transition-all hover:border-sky-300" data-category="star5">
            <div class="flex items-start justify-between gap-2 pb-2 border-b border-gray-100">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#173B67] font-bold text-sm flex items-center justify-center border border-sky-100 shrink-0">
                        D
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Dimas Pratama</h3>
                            <span class="px-1.5 py-0.2 rounded text-[8px] font-bold bg-gray-100 text-gray-600">Customer</span>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-0.5 truncate">Pesanan #SB-2026-085 • Full Home Cleaning</p>
                    </div>
                </div>
                <div class="text-right shrink-0">
                    <div class="flex items-center text-amber-400 text-xs gap-0.5">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="text-[9px] text-gray-400 block mt-0.5">Kemarin</span>
                </div>
            </div>

            {{-- REVIEW BODY --}}
            <div>
                <p class="text-[11px] text-gray-700 leading-relaxed">
                    "Pekerjaan sangat rapi dan teliti! Mas Budi Santoso datang tepat waktu dengan seragam dan alat pembersih lengkap. Kamar mandi dan dapur dibersihkan sampai kinclong tanpa sisa noda. Sangat recommended untuk langganan rutin!"
                </p>
            </div>

            {{-- MITRA INFO TAG --}}
            <div class="p-2 rounded-xl bg-sky-50/70 border border-sky-100 flex items-center justify-between text-[10px]">
                <span class="text-gray-600">
                    Mitra Penyedia: <strong class="text-gray-900">Budi Santoso</strong> (Cleaning Service)
                </span>
                <span class="text-[9px] font-bold text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded-md">
                    ★ 4.9 Mitra
                </span>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex items-center justify-between pt-1 border-t border-gray-100 text-xs">
                <span class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1">
                    <i class="fa-solid fa-circle-check text-[9px]"></i> Tayang Publik
                </span>
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="openReplyPrompt('Dimas Pratama')" class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] font-bold text-[10px] hover:bg-sky-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-reply text-[9px]"></i> Balas Ulasan
                    </button>
                    <button type="button" onclick="showToast('Sematkan Ulasan', 'Ulasan Dimas Pratama berhasil disematkan di halaman depan aplikasi.', 'success')" class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-thumbtack text-[9px]"></i> Pin
                    </button>
                </div>
            </div>
        </div>

        {{-- REVIEW 2: Bintang 5 - Maya Anggraini to Joko Susilo --}}
        <div class="review-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 transition-all hover:border-sky-300" data-category="star5">
            <div class="flex items-start justify-between gap-2 pb-2 border-b border-gray-100">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-700 font-bold text-sm flex items-center justify-center border border-purple-100 shrink-0">
                        M
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Maya Anggraini</h3>
                            <span class="px-1.5 py-0.2 rounded text-[8px] font-bold bg-amber-100 text-amber-800">VIP</span>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-0.5 truncate">Pesanan #SB-2026-082 • Servis & Cuci AC</p>
                    </div>
                </div>
                <div class="text-right shrink-0">
                    <div class="flex items-center text-amber-400 text-xs gap-0.5">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="text-[9px] text-gray-400 block mt-0.5">2 hari lalu</span>
                </div>
            </div>

            {{-- REVIEW BODY --}}
            <div>
                <p class="text-[11px] text-gray-700 leading-relaxed">
                    "AC kamar utama yang sebelumnya berisik dan bocor sekarang dingin menusuk tulang! Teknisi Pak Joko Susilo sangat ramah, menjelaskan kondisi freon secara jujur, dan membersihkan lantai setelah pengerjaan selesai. Top markotop!"
                </p>
            </div>

            {{-- MITRA INFO TAG --}}
            <div class="p-2 rounded-xl bg-sky-50/70 border border-sky-100 flex items-center justify-between text-[10px]">
                <span class="text-gray-600">
                    Mitra Penyedia: <strong class="text-gray-900">Joko Susilo</strong> (Teknisi AC)
                </span>
                <span class="text-[9px] font-bold text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded-md">
                    ★ 5.0 Mitra
                </span>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex items-center justify-between pt-1 border-t border-gray-100 text-xs">
                <span class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1">
                    <i class="fa-solid fa-circle-check text-[9px]"></i> Tayang Publik
                </span>
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="openReplyPrompt('Maya Anggraini')" class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] font-bold text-[10px] hover:bg-sky-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-reply text-[9px]"></i> Balas Ulasan
                    </button>
                    <button type="button" onclick="showToast('Sematkan Ulasan', 'Ulasan Maya Anggraini telah dipasang sebagai testimoni unggulan.', 'success')" class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-thumbtack text-[9px]"></i> Pin
                    </button>
                </div>
            </div>
        </div>

        {{-- REVIEW 3: Bintang 1 - Rina Wulandari (Perlu Ditindak / Tiket Konflik) --}}
        <div class="review-card p-4 rounded-[22px] bg-rose-50/30 border border-rose-200/80 shadow-sm space-y-3 transition-all hover:border-rose-400" data-category="star1 problem">
            <div class="flex items-start justify-between gap-2 pb-2 border-b border-rose-100">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-700 font-bold text-sm flex items-center justify-center border border-rose-200 shrink-0">
                        R
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Rina Wulandari</h3>
                            <span class="px-1.5 py-0.2 rounded text-[8px] font-bold bg-rose-100 text-rose-800 border border-rose-300">KELUHAN</span>
                        </div>
                        <p class="text-[10px] text-gray-500 mt-0.5 truncate">Pesanan #SB1022 • Tiket Konflik #KF-104</p>
                    </div>
                </div>
                <div class="text-right shrink-0">
                    <div class="flex items-center text-rose-500 text-xs gap-0.5">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star text-gray-300"></i>
                        <i class="fa-regular fa-star text-gray-300"></i>
                        <i class="fa-regular fa-star text-gray-300"></i>
                        <i class="fa-regular fa-star text-gray-300"></i>
                    </div>
                    <span class="text-[9px] text-rose-500 font-bold block mt-0.5">Perlu Aksi</span>
                </div>
            </div>

            {{-- REVIEW BODY --}}
            <div>
                <p class="text-[11px] text-rose-950 font-medium leading-relaxed bg-white/80 p-2.5 rounded-xl border border-rose-200/60">
                    "Mitra datang terlambat 45 menit tanpa kabar. Pas sampai malah minta tambahan ongkos bensin Rp 50.000 di luar tagihan SayaBantu. Sangat mengecewakan, mohon admin segera selesaikan!"
                </p>
            </div>

            {{-- MITRA INFO TAG --}}
            <div class="p-2 rounded-xl bg-white border border-rose-200 flex items-center justify-between text-[10px]">
                <span class="text-gray-600">
                    Mitra Terlapor: <strong class="text-gray-900">Agus Prasetyo</strong>
                </span>
                <span class="text-[9px] font-bold text-rose-700 bg-rose-100 px-2 py-0.5 rounded-md">
                    Tiket #KF-104
                </span>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex items-center justify-between pt-1 border-t border-rose-100 text-xs">
                <span class="text-[10px] text-rose-600 font-bold flex items-center gap-1">
                    <i class="fa-solid fa-triangle-exclamation text-[9px]"></i> Mediasi Dibutuhkan
                </span>
                <div class="flex items-center gap-1.5">
                    <a href="{{ route('admin.konflik') }}" class="px-2.5 py-1 rounded-lg bg-rose-600 text-white font-bold text-[10px] hover:bg-rose-700 transition-colors inline-flex items-center gap-1 shadow-sm">
                        <i class="fa-solid fa-scale-balanced text-[9px]"></i> Buka Kasus
                    </a>
                    <button type="button" onclick="showToast('Teguran Mitra', 'Peringatan resmi SP-1 dikirimkan ke mitra Agus Prasetyo atas pelanggaran tarif.', 'warning')" class="px-2.5 py-1 rounded-lg bg-white text-rose-700 font-bold text-[10px] hover:bg-rose-50 transition-colors inline-flex items-center gap-1 border border-rose-200">
                        <i class="fa-solid fa-ban text-[9px]"></i> Beri SP
                    </button>
                </div>
            </div>
        </div>

        {{-- REVIEW 4: Bintang 4 - Hendra Setiawan to Siti Rahmawati --}}
        <div class="review-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 transition-all hover:border-sky-300" data-category="star4">
            <div class="flex items-start justify-between gap-2 pb-2 border-b border-gray-100">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#173B67] font-bold text-sm flex items-center justify-center border border-sky-100 shrink-0">
                        H
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Hendra Setiawan</h3>
                            <span class="px-1.5 py-0.2 rounded text-[8px] font-bold bg-gray-100 text-gray-600">Customer</span>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-0.5 truncate">Pesanan #SB-2026-077 • Cuci Sepatu & Sofa</p>
                    </div>
                </div>
                <div class="text-right shrink-0">
                    <div class="flex items-center text-amber-400 text-xs gap-0.5">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star text-gray-300"></i>
                    </div>
                    <span class="text-[9px] text-gray-400 block mt-0.5">3 hari lalu</span>
                </div>
            </div>

            {{-- REVIEW BODY --}}
            <div>
                <p class="text-[11px] text-gray-700 leading-relaxed">
                    "Hasil cuci sofa bersih dan harum. Hanya saja proses pengeringan memakan waktu sedikit lebih lama dari perkiraan karena cuaca mendung. Pelayanan ramah dan sopan."
                </p>
            </div>

            {{-- MITRA INFO TAG --}}
            <div class="p-2 rounded-xl bg-sky-50/70 border border-sky-100 flex items-center justify-between text-[10px]">
                <span class="text-gray-600">
                    Mitra Penyedia: <strong class="text-gray-900">Siti Rahmawati</strong>
                </span>
                <span class="text-[9px] font-bold text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded-md">
                    ★ 4.8 Mitra
                </span>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex items-center justify-between pt-1 border-t border-gray-100 text-xs">
                <span class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1">
                    <i class="fa-solid fa-circle-check text-[9px]"></i> Tayang Publik
                </span>
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="openReplyPrompt('Hendra Setiawan')" class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] font-bold text-[10px] hover:bg-sky-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-reply text-[9px]"></i> Balas Ulasan
                    </button>
                    <button type="button" onclick="showToast('Ulasan Disimpan', 'Telah dicatat dalam arsip kepuasan pelanggan.', 'info')" class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors inline-flex items-center gap-1">
                        Arsipkan
                    </button>
                </div>
            </div>
        </div>

    </div>

    {{-- EMPTY STATE REVIEW --}}
    <div id="emptyReview" class="hidden p-8 text-center bg-white rounded-[22px] border border-gray-100 shadow-sm space-y-2">
        <div class="w-12 h-12 rounded-2xl bg-gray-100 text-gray-400 mx-auto flex items-center justify-center text-xl">
            <i class="fa-regular fa-star-half-stroke"></i>
        </div>
        <h4 class="text-xs font-bold text-gray-800">Tidak Ada Ulasan</h4>
        <p class="text-[10px] text-gray-400">Belum ada review pelanggan pada kategori rating ini.</p>
        <button type="button" onclick="filterReview('all')" class="mt-2 text-[10px] font-bold text-[#173B67] bg-sky-50 hover:bg-sky-100 px-3 py-1.5 rounded-lg transition-colors">
            Tampilkan Semua Ulasan
        </button>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function toggleRatingFilters(button) {
        const options = document.getElementById('ratingFilterOptions');
        if (!options) return;

        const isHidden = options.classList.toggle('hidden');
        button.setAttribute('aria-expanded', String(!isHidden));
        button.querySelector('i')?.classList.toggle('fa-chevron-up', !isHidden);
        button.querySelector('i')?.classList.toggle('fa-chevron-down', isHidden);
    }

    function filterReview(cat, btnEl) {
        document.querySelectorAll('.review-filter-tab').forEach(b => {
            b.classList.remove('active', 'bg-[#173B67]', 'text-white', 'border-sky-400/40');
            b.classList.add('bg-white/10', 'text-gray-300');
        });

        if (btnEl) {
            btnEl.classList.add('active', 'bg-[#173B67]', 'text-white', 'border-sky-400/40');
            btnEl.classList.remove('bg-white/10', 'text-gray-300');
        } else {
            const defaultBtn = document.querySelector('.review-filter-tab');
            if (defaultBtn) {
                defaultBtn.classList.add('active', 'bg-[#173B67]', 'text-white', 'border-sky-400/40');
                defaultBtn.classList.remove('bg-white/10', 'text-gray-300');
            }
        }

        const ratingOptions = document.getElementById('ratingFilterOptions');
        const ratingToggle = document.getElementById('ratingFilterToggle');
        if (ratingOptions && !ratingOptions.classList.contains('hidden')) {
            ratingOptions.classList.add('hidden');
            ratingToggle?.setAttribute('aria-expanded', 'false');
            ratingToggle?.querySelector('i')?.classList.replace('fa-chevron-up', 'fa-chevron-down');
        }

        const cards = document.querySelectorAll('.review-card');
        const empty = document.getElementById('emptyReview');
        let count = 0;

        cards.forEach(card => {
            const cardCategories = (card.getAttribute('data-category') || '').split(' ');
            if (cat === 'all' || cardCategories.includes(cat)) {
                card.style.display = 'block';
                count++;
            } else {
                card.style.display = 'none';
            }
        });

        if (count === 0) {
            if (empty) empty.classList.remove('hidden');
        } else {
            if (empty) empty.classList.add('hidden');
        }
    }

    function openReplyPrompt(customerName) {
        const replyText = prompt(`Balas ulasan dari ${customerName}:`, 'Terima kasih banyak atas ulasan positif dan kepercayaan Anda menggunakan layanan SayaBantu.com! 🙏');
        if (replyText !== null && replyText.trim() !== '') {
            showToast('Balasan Terkirim', `Balasan admin untuk ${customerName} telah dipublikasikan.`, 'success');
        }
    }
</script>
@endpush
