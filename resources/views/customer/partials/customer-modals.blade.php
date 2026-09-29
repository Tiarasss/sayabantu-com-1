{{-- =========================================================================
     SAYABANTU.COM - CUSTOMER & MITRA MODALS COMPONENT
     - Modal Login Dual-Role: Customer & Mitra
     - Modal Profil Customer (VIP)
     - Modal Profil Mitra (Bocah SayaBantu)
     - Modal Detail Mitra / Bocah SayaBantu dengan Foto & Verifikasi
     - Modal Notifikasi & Lacak Suruhan
     - Modal Gated WhatsApp (Hanya Muncul Jika Sudah Login)
========================================================================== --}}

{{-- BACKDROP OVERLAY --}}
<div id="customerBackdrop" onclick="closeAllCustomerModals()" class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs z-50 hidden transition-opacity duration-300"></div>

{{-- =====================================================
     1. MODAL LOGIN DUAL-ROLE (CUSTOMER & MITRA)
====================================================== --}}
<div id="modalLoginCustomer" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[400px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200/80">
    
    {{-- MODAL HEADER --}}
    <div class="bg-gradient-to-r from-[#0E1D31] to-[#173B67] text-white p-4 relative">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-xl bg-sky-400/20 text-sky-300 flex items-center justify-center font-bold text-sm border border-sky-400/30">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-tight" id="loginModalTitle">Masuk ke SayaBantu.com</h3>
                    <p class="text-[10px] text-slate-300">Pilih peran akun Anda untuk melanjutkan</p>
                </div>
            </div>
            <button type="button" onclick="closeAllCustomerModals()" class="text-slate-300 hover:text-white p-1">
                <i class="fa-solid fa-xmark text-base"></i>
            </button>
        </div>

        {{-- TAB SWITCHER: CUSTOMER VS MITRA --}}
        <div class="grid grid-cols-2 gap-1.5 p-1 bg-black/25 rounded-xl mt-3 text-xs font-bold">
            <button
                type="button"
                id="tabBtnCustomer"
                onclick="switchLoginRole('customer')"
                class="py-1.5 rounded-lg transition-all text-center bg-white text-[#0E1D31] shadow-xs flex items-center justify-center gap-1.5"
            >
                <i class="fa-solid fa-user text-[11px]"></i> Customer
            </button>
            <button
                type="button"
                id="tabBtnMitra"
                onclick="switchLoginRole('mitra')"
                class="py-1.5 rounded-lg transition-all text-center text-slate-300 hover:text-white flex items-center justify-center gap-1.5"
            >
                <i class="fa-solid fa-helmet-safety text-[11px]"></i> Mitra / Helper
            </button>
        </div>
    </div>

    {{-- MODAL BODY --}}
    <div class="p-4 space-y-3.5 text-xs text-slate-700">

        {{-- KONTEN ROLE: CUSTOMER --}}
        <div id="roleContentCustomer" class="space-y-3">
            <div class="bg-blue-50/70 p-3 rounded-xl border border-blue-100 flex items-start gap-2">
                <i class="fa-solid fa-circle-info text-sky-600 mt-0.5 shrink-0"></i>
                <p class="text-[11px] text-sky-900 leading-snug">
                    Situs SayaBantu.com bebas dijelajahi tanpa login. Masuk sebagai <strong>Customer</strong> hanya jika Anda ingin membuat pesanan, menikmati diskon VIP, dan membuka kontak WhatsApp CS resmi.
                </p>
            </div>

            {{-- 1-CLICK DEMO LOGIN CUSTOMER --}}
            <button 
                type="button" 
                onclick="quickLoginCustomerAction('Budi Santoso', '0812-3456-7890')" 
                class="w-full py-2.5 px-3 rounded-xl bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold text-xs shadow-sm flex items-center justify-center gap-2 transition-all"
            >
                <i class="fa-solid fa-bolt text-xs"></i> 1-Klik Masuk sebagai Customer (Budi)
            </button>

            <div class="flex items-center gap-2 text-slate-400 text-[10px] my-1">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span>atau nomor WhatsApp Anda</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <form onsubmit="handleManualCustomerLogin(event)" class="space-y-2.5">
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Nomor WhatsApp</label>
                    <input 
                        type="text" 
                        id="inputLoginCustomerPhone" 
                        placeholder="Contoh: 081234567890" 
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                        required
                    >
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Kata Sandi</label>
                    <input 
                        type="password" 
                        id="inputLoginCustomerPass" 
                        placeholder="••••••••" 
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                        value="customer123"
                        required
                    >
                </div>
                <button 
                    type="submit" 
                    class="w-full py-2.5 rounded-xl bg-[#0E1D31] hover:bg-[#173B67] text-white font-bold text-xs shadow-sm transition-all"
                >
                    Masuk Akun Customer
                </button>
            </form>

            {{-- DIVIDER --}}
            <div class="flex items-center gap-2 text-slate-400 text-[10px]">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span>atau</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            {{-- MASUK DENGAN GOOGLE --}}
            <button
                type="button"
                onclick="handleGoogleAuth('masuk')"
                class="w-full py-2.5 px-3 rounded-xl bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 font-bold text-xs shadow-sm flex items-center justify-center gap-2 transition-all"
            >
                <i class="fa-brands fa-google text-[15px] text-rose-500"></i> Masuk dengan Google
            </button>
        </div>

        {{-- KONTEN ROLE: MITRA --}}
        <div id="roleContentMitra" class="hidden space-y-3">
            <div class="bg-emerald-50/70 p-3 rounded-xl border border-emerald-100 flex items-start gap-2">
                <i class="fa-solid fa-handshake-angle text-emerald-600 mt-0.5 shrink-0"></i>
                <p class="text-[11px] text-emerald-900 leading-snug">
                    Portal <strong>Bocah SayaBantu (Mitra)</strong>: pantau penugasan otomatis sistem, dompet penghasilan harian, dan akses langsung ke WhatsApp Dispatcher.
                </p>
            </div>

            {{-- 1-CLICK DEMO LOGIN MITRA --}}
            <button
                type="button"
                onclick="quickLoginMitraAction('Bambang Sutrisno', '0813-9876-5432', 'Pindahan & Home Cleaning')"
                class="w-full py-2.5 px-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs shadow-sm flex items-center justify-center gap-2 transition-all"
            >
                <i class="fa-solid fa-helmet-safety text-xs"></i> 1-Klik Masuk sebagai Mitra (Bambang)
            </button>

            <div class="flex items-center gap-2 text-slate-400 text-[10px] my-1">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span>atau nomor ID Mitra / WhatsApp</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <form onsubmit="handleManualMitraLogin(event)" class="space-y-2.5">
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">ID Mitra / WhatsApp</label>
                    <input
                        type="text"
                        id="inputLoginMitraPhone"
                        placeholder="Contoh: #MTR-0042 atau 081398765432"
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-emerald-600 focus:outline-none"
                        required
                    >
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">PIN / Sandi Mitra</label>
                    <input
                        type="password"
                        id="inputLoginMitraPass"
                        placeholder="••••••••"
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-emerald-600 focus:outline-none"
                        value="mitra123"
                        required
                    >
                </div>
                <button
                    type="submit"
                    class="w-full py-2.5 rounded-xl bg-emerald-700 hover:bg-emerald-600 text-white font-bold text-xs shadow-sm transition-all"
                >
                    Masuk Portal Mitra
                </button>
            </form>
        </div>

        {{-- FOOTER MODAL: opsi daftar + halaman login lengkap --}}
        <div class="pt-2 border-t border-slate-100 text-center text-[11px] space-y-1.5">
            <p class="text-slate-500">
                Belum punya akun?
                <button type="button" onclick="closeAllCustomerModals(); openModal('modalDaftarCustomer');" class="text-sky-600 font-bold underline">Daftar</button>
            </p>
            <a href="{{ route('customer.login') }}" class="inline-block text-sky-600 font-bold hover:underline">
                Halaman Login Lengkap »
            </a>
        </div>

    </div>

</div>


{{-- =====================================================
     1B. MODAL DAFTAR (HALAMAN DAFTAR)
====================================================== --}}
<div id="modalDaftarCustomer" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[400px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200/80">

    {{-- MODAL HEADER --}}
    <div class="bg-gradient-to-r from-[#0E1D31] to-[#173B67] text-white p-4 relative">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-xl bg-sky-400/20 text-sky-300 flex items-center justify-center font-bold text-sm border border-sky-400/30">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-tight">Daftar Akun SayaBantu</h3>
                    <p class="text-[10px] text-slate-300">Gratis, lengkapi data berikut</p>
                </div>
            </div>
            <button type="button" onclick="closeAllCustomerModals()" class="text-slate-300 hover:text-white p-1">
                <i class="fa-solid fa-xmark text-base"></i>
            </button>
        </div>
    </div>

    {{-- MODAL BODY --}}
    <div class="p-4 space-y-3.5 text-xs text-slate-700">

        <div class="bg-blue-50/70 p-3 rounded-xl border border-blue-100 flex items-start gap-2">
            <i class="fa-solid fa-circle-info text-sky-600 mt-0.5 shrink-0"></i>
            <p class="text-[11px] text-sky-900 leading-snug">
                Buat akun <strong>Customer</strong> untuk memesan layanan, memantau status, dan membuka kontak WhatsApp CS resmi.
            </p>
        </div>

        <form onsubmit="handleManualDaftarCustomer(event)" class="space-y-2.5">
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Nama Lengkap</label>
                <input
                    type="text"
                    id="inputDaftarNama"
                    placeholder="Contoh: Budi Santoso"
                    class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                    required
                >
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Nomor WhatsApp</label>
                <input
                    type="text"
                    id="inputDaftarPhone"
                    placeholder="Contoh: 081234567890"
                    class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                    required
                >
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Kata Sandi</label>
                <input
                    type="password"
                    id="inputDaftarPass"
                    placeholder="Minimal 6 karakter"
                    class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full py-2.5 rounded-xl bg-[#0E1D31] hover:bg-[#173B67] text-white font-bold text-xs shadow-sm transition-all"
            >
                Daftar Akun
            </button>
        </form>

        {{-- DIVIDER --}}
        <div class="flex items-center gap-2 text-slate-400 text-[10px]">
            <div class="flex-1 h-px bg-slate-200"></div>
            <span>atau</span>
            <div class="flex-1 h-px bg-slate-200"></div>
        </div>

        {{-- DAFTAR DENGAN GOOGLE --}}
        <button
            type="button"
            onclick="handleGoogleAuth('daftar')"
            class="w-full py-2.5 px-3 rounded-xl bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 font-bold text-xs shadow-sm flex items-center justify-center gap-2 transition-all"
        >
            <i class="fa-brands fa-google text-[15px] text-rose-500"></i> Daftar dengan Google
        </button>
    </div>

    {{-- FOOTER MODAL --}}
    <div class="px-4 pb-4 text-center text-[11px]">
        <p class="text-slate-500">
            Sudah punya akun?
            <button type="button" onclick="closeAllCustomerModals(); openModal('modalLoginCustomer');" class="text-sky-600 font-bold underline">Masuk</button>
        </p>
    </div>

</div>


{{-- =====================================================
     2. MODAL PROFIL CUSTOMER (KETIKA SUDAH LOGIN CUSTOMER)
====================================================== --}}
<div id="modalProfileCustomer" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[390px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200/80">
    
    <div class="bg-gradient-to-r from-[#0E1D31] to-[#173B67] text-white p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-10 h-10 rounded-full bg-sky-400 text-slate-950 font-black text-base flex items-center justify-center shadow-md" id="profAvatarInitial">
                    B
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-tight" id="profCustomerName">Budi Santoso</h3>
                    <span class="text-[10px] text-slate-300" id="profCustomerPhone">0812-3456-7890</span>
                </div>
            </div>
            <button type="button" onclick="closeAllCustomerModals()" class="text-slate-300 hover:text-white p-1">
                <i class="fa-solid fa-xmark text-base"></i>
            </button>
        </div>
    </div>

    <div class="p-4 space-y-3 text-xs">
        
        <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center justify-between">
            <div class="flex items-center gap-2 text-emerald-800 font-bold">
                <i class="fa-solid fa-shield-check text-base text-emerald-600"></i>
                <span>Status: Member VIP Terverifikasi</span>
            </div>
            <span class="text-[10px] bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-extrabold">#CUST-104</span>
        </div>

        <div class="space-y-1.5 pt-1">
            <button type="button" onclick="closeAllCustomerModals(); openModal('modalLacakPesanan');" class="w-full text-left p-3 rounded-xl hover:bg-slate-50 border border-slate-200/80 flex items-center justify-between transition-colors">
                <span class="flex items-center gap-2.5 font-bold text-slate-800">
                    <i class="fa-solid fa-file-invoice text-sky-600 w-4"></i> Riwayat & Status Suruhan
                </span>
                <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
            </button>

            {{-- WA UNLOCKED LINK --}}
            <a href="https://wa.me/6281234567890?text=Halo%20SayaBantu%2C%20saya%20Customer%20Budi%20Santoso%20(VIP)%20butuh%20bantuan%20suruhan." target="_blank" class="w-full text-left p-3 rounded-xl bg-emerald-50 hover:bg-emerald-100/80 border border-emerald-200 flex items-center justify-between transition-colors text-emerald-800">
                <span class="flex items-center gap-2.5 font-bold">
                    <i class="fa-brands fa-whatsapp text-emerald-600 w-4 text-base"></i> Bantuan CS WhatsApp 24 Jam
                </span>
                <span class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-emerald-200/70 text-emerald-900">Aktif</span>
            </a>
        </div>

        <div class="pt-2 border-t border-slate-100">
            <button 
                type="button" 
                onclick="logoutUserAction()" 
                class="w-full py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 font-bold text-xs flex items-center justify-center gap-2 transition-colors"
            >
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar dari Akun
            </button>
        </div>

    </div>

</div>


{{-- =====================================================
     3. MODAL PROFIL MITRA (KETIKA SUDAH LOGIN MITRA)
====================================================== --}}
<div id="modalProfileMitra" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[390px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200/80">
    
    <div class="bg-gradient-to-r from-[#0E1D31] to-[#047857] text-white p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-10 h-10 rounded-full bg-emerald-400 text-slate-950 font-black text-base flex items-center justify-center shadow-md">
                    BS
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-tight" id="profMitraName">Bambang Sutrisno</h3>
                    <span class="text-[10px] text-emerald-200 font-mono">#MTR-0042 • Bocah SayaBantu</span>
                </div>
            </div>
            <button type="button" onclick="closeAllCustomerModals()" class="text-slate-300 hover:text-white p-1">
                <i class="fa-solid fa-xmark text-base"></i>
            </button>
        </div>
    </div>

    <div class="p-4 space-y-3 text-xs">
        
        {{-- MITRA EARNINGS & STATUS --}}
        <div class="p-3 bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 rounded-xl space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-slate-600 font-medium text-[11px]">Status Kerja:</span>
                <span class="text-[10px] bg-emerald-600 text-white px-2.5 py-0.5 rounded-full font-extrabold flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> Online Siap Tugas
                </span>
            </div>
            <div class="flex items-center justify-between pt-1 border-t border-emerald-100">
                <span class="text-slate-600 font-medium text-[11px]">Penghasilan Hari Ini:</span>
                <strong class="text-emerald-700 text-sm font-black">Rp 450.000</strong>
            </div>
            <div class="flex items-center justify-between text-[10px] text-slate-500">
                <span>Rating: ★ 4.9 (142 Tugas)</span>
                <span>Radius: 2.5 km (Menteng)</span>
            </div>
        </div>

        <div class="space-y-1.5 pt-1">
            {{-- WA UNLOCKED LINK FOR MITRA --}}
            <a href="https://wa.me/6281234567890?text=Halo%20Dispatcher%20SayaBantu%2C%20saya%20Mitra%20Bambang%20Sutrisno%20(#MTR-0042)%20siap%20menerima%20penugasan." target="_blank" class="w-full text-left p-3 rounded-xl bg-emerald-50 hover:bg-emerald-100/80 border border-emerald-200 flex items-center justify-between transition-colors text-emerald-800">
                <span class="flex items-center gap-2.5 font-bold">
                    <i class="fa-brands fa-whatsapp text-emerald-600 w-4 text-base"></i> Hubungi Dispatcher Admin WA
                </span>
                <span class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-emerald-200/70 text-emerald-900">Aktif</span>
            </a>

            <button type="button" onclick="showCustomerToast('Job Sekitar', '3 tugas baru tersedia di radius Anda.', 'info')" class="w-full text-left p-3 rounded-xl hover:bg-slate-50 border border-slate-200/80 flex items-center justify-between transition-colors">
                <span class="flex items-center gap-2.5 font-bold text-slate-800">
                    <i class="fa-solid fa-list-check text-sky-600 w-4"></i> Tugas Tersedia di Sekitar
                </span>
                <span class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-sky-100 text-sky-800">3 Job</span>
            </button>
        </div>

        <div class="pt-2 border-t border-slate-100">
            <button 
                type="button" 
                onclick="logoutUserAction()" 
                class="w-full py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 font-bold text-xs flex items-center justify-center gap-2 transition-colors"
            >
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar dari Mode Mitra
            </button>
        </div>

    </div>

</div>


{{-- =====================================================
     4. MODAL GATED WHATSAPP NOTICE (MUNCUL JIKA TAMU KLIK WA)
====================================================== --}}
<div id="modalWaGatedNotice" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[390px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200">
    
    <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center text-lg font-bold">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-tight">Kontak WhatsApp Resmi</h3>
                    <p class="text-[10px] text-emerald-100">Khusus Customer & Mitra Terdaftar</p>
                </div>
            </div>
            <button type="button" onclick="closeAllCustomerModals()" class="text-emerald-100 hover:text-white p-1">
                <i class="fa-solid fa-xmark text-base"></i>
            </button>
        </div>
    </div>

    <div class="p-4 space-y-3.5 text-xs text-slate-700">
        <div class="bg-amber-50 p-3.5 rounded-xl border border-amber-200 flex items-start gap-2.5">
            <i class="fa-solid fa-shield-halved text-amber-600 mt-0.5 text-sm shrink-0"></i>
            <div>
                <strong class="text-xs font-bold text-amber-900 block">Akses WhatsApp Dilindungi</strong>
                <p class="text-[11px] text-amber-800 leading-relaxed mt-0.5">
                    Demi keamanan data dan kepastian penugasan, link WhatsApp CS serta komunikasi mitra hanya terbuka untuk pengguna yang telah masuk sebagai <strong>Customer</strong> atau <strong>Mitra</strong>.
                </p>
            </div>
        </div>

        <div class="space-y-2 pt-1">
            <button 
                type="button" 
                onclick="closeAllCustomerModals(); switchLoginRole('customer'); openModal('modalLoginCustomer');" 
                class="w-full py-2.5 rounded-xl bg-[#0E1D31] hover:bg-[#173B67] text-white font-bold text-xs flex items-center justify-center gap-2 shadow-sm transition-all"
            >
                <i class="fa-solid fa-user"></i> Masuk sebagai Customer (Buka WA)
            </button>
            <button 
                type="button" 
                onclick="closeAllCustomerModals(); switchLoginRole('mitra'); openModal('modalLoginCustomer');" 
                class="w-full py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-sm transition-all"
            >
                <i class="fa-solid fa-helmet-safety"></i> Masuk sebagai Mitra (Buka WA)
            </button>
        </div>
    </div>

</div>


{{-- =====================================================
     5. MODAL DETAIL MITRA / BOCAH SAYABANTU (DENGAN FOTO)
====================================================== --}}
<div id="modalDetailBocah" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[400px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200">
    
    <div class="bg-gradient-to-r from-[#0E1D31] to-[#173B67] text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-sky-400"></i>
            <h3 class="text-sm font-bold">Profil Personil Bocah SayaBantu</h3>
        </div>
        <button type="button" onclick="closeAllCustomerModals()" class="text-slate-300 hover:text-white p-1">
            <i class="fa-solid fa-xmark text-base"></i>
        </button>
    </div>

    <div class="p-4 space-y-3.5 text-xs text-slate-700 max-h-[75vh] overflow-y-auto">
        
        {{-- KARTU FOTO & BIODATA MITRA --}}
        <div class="flex items-center gap-3.5 p-3 rounded-xl bg-slate-50 border border-slate-200">
            <div class="relative shrink-0">
                <img 
                    id="bocahDetailPhoto"
                    src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" 
                    alt="Foto Mitra"
                    class="w-16 h-16 rounded-2xl object-cover border-2 border-white shadow-md"
                    onerror="this.src='https://ui-avatars.com/api/?name=Mitra+SayaBantu&background=173B67&color=fff'"
                >
                <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white flex items-center justify-center text-[7px] text-white" title="Online">
                    <i class="fa-solid fa-check"></i>
                </span>
            </div>
            <div class="min-w-0 flex-1">
                <h4 class="text-sm font-bold text-slate-900 truncate" id="bocahDetailName">Bambang Sutrisno</h4>
                <p class="text-[11px] text-sky-700 font-semibold" id="bocahDetailSpecialty">Spesialis: Pindahan & Home Cleaning</p>
                <div class="flex items-center gap-2 mt-1 text-[10px] text-slate-500">
                    <span id="bocahDetailRating" class="text-amber-500 font-bold">★ 4.9 (142 Tugas)</span>
                    <span>•</span>
                    <span id="bocahDetailRegion" class="text-slate-600 font-medium">Jakarta Pusat</span>
                </div>
            </div>
        </div>

        {{-- STATUS PENUGASAN SISTEM (BUKAN KITA YANG MILIH) --}}
        <div class="p-3 bg-blue-50/80 border border-blue-200 rounded-xl space-y-1 text-[11px]">
            <strong class="font-bold text-[#173B67] flex items-center gap-1.5">
                <i class="fa-solid fa-wand-magic-sparkles text-sky-600"></i> Penugasan Otomatis oleh Sistem
            </strong>
            <p class="text-slate-600 leading-snug">
                Mitra ini adalah salah satu personil standby kami. Saat Anda mengajukan suruhan, sistem cerdas SayaBantu akan otomatis mencocokkan mitra terdekat dengan rating terbaik tanpa Anda harus repot memilih manual.
            </p>
        </div>

        {{-- VERIFIKASI IDENTITAS --}}
        <div class="space-y-1.5">
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Verifikasi & Kredensial Resmi</span>
            <div class="grid grid-cols-2 gap-2 text-[10px]">
                <div class="p-2 rounded-lg bg-slate-50 border border-slate-200 flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-emerald-600"></i>
                    <span class="font-semibold text-slate-800">KTP Terverifikasi</span>
                </div>
                <div class="p-2 rounded-lg bg-slate-50 border border-slate-200 flex items-center gap-2">
                    <i class="fa-solid fa-file-shield text-emerald-600"></i>
                    <span class="font-semibold text-slate-800">SKCK Kepolisian</span>
                </div>
                <div class="p-2 rounded-lg bg-slate-50 border border-slate-200 flex items-center gap-2">
                    <i class="fa-solid fa-heart-pulse text-emerald-600"></i>
                    <span class="font-semibold text-slate-800">Bebas Narkoba</span>
                </div>
                <div class="p-2 rounded-lg bg-slate-50 border border-slate-200 flex items-center gap-2">
                    <i class="fa-solid fa-shield-virus text-emerald-600"></i>
                    <span class="font-semibold text-slate-800">Vaksin Lengkap</span>
                </div>
            </div>
        </div>

        {{-- ACTION BUTTON --}}
        <div class="pt-2 border-t border-slate-100 flex gap-2">
            <button 
                type="button" 
                onclick="closeAllCustomerModals(); scrollToOrderForm();" 
                class="flex-1 py-2.5 rounded-xl bg-[#0E1D31] hover:bg-[#173B67] text-white font-bold text-xs transition-colors text-center"
            >
                Buat Suruhan Sekarang »
            </button>
            <button 
                type="button" 
                onclick="closeAllCustomerModals()" 
                class="px-3.5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors"
            >
                Tutup
            </button>
        </div>

    </div>

</div>


{{-- =====================================================
     6. MODAL KONFIRMASI SURUHAN
====================================================== --}}
<div id="modalKonfirmasiOrder" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[400px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200">
    
    <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center font-bold text-sm">
                <i class="fa-solid fa-check"></i>
            </div>
            <div>
                <h3 class="text-sm font-bold leading-tight">Suruhan Berhasil Diajukan!</h3>
                <span class="text-[10px] text-emerald-100" id="confOrderCode">#SB-SURUH-8492</span>
            </div>
        </div>
        <button type="button" onclick="closeAllCustomerModals()" class="text-emerald-100 hover:text-white p-1">
            <i class="fa-solid fa-xmark text-base"></i>
        </button>
    </div>

    <div class="p-4 space-y-3 text-xs">
        
        <div class="p-3.5 rounded-xl bg-blue-50/80 border border-blue-200 space-y-1">
            <span class="text-[11px] font-bold text-[#173B67] flex items-center gap-1.5">
                <i class="fa-solid fa-wand-magic-sparkles text-sky-600"></i> Sistem Sedang Mencocokkan Mitra
            </span>
            <p class="text-[10px] text-slate-600">
                Mitra terbaik yang terdekat dari lokasi Anda akan otomatis ditugaskan dalam 5-10 menit.
            </p>
        </div>

        <div class="bg-slate-50 p-3.5 rounded-xl border border-slate-200/80 space-y-2">
            <div class="flex justify-between items-center text-slate-600">
                <span>Layanan:</span>
                <strong class="text-slate-900 font-bold" id="confLayanan">-</strong>
            </div>
            <div class="flex justify-between items-center text-slate-600">
                <span>Jadwal:</span>
                <span class="text-slate-900 font-semibold" id="confWaktu">-</span>
            </div>
            <div class="flex justify-between items-center text-slate-600">
                <span>Penawaran Budget:</span>
                <strong class="text-emerald-600 font-extrabold text-sm" id="confBudget">-</strong>
            </div>
            <div class="flex justify-between items-center text-slate-600">
                <span>Pemesan:</span>
                <span class="text-slate-900 font-semibold" id="confPemesan">-</span>
            </div>
            <div class="pt-2 border-t border-slate-200 text-slate-600">
                <span class="text-[10px] text-slate-400 block mb-0.5">Catatan & Lokasi:</span>
                <p class="text-[11px] text-slate-800 italic" id="confNote">-</p>
            </div>
        </div>

        <a id="btnSendWaOrder" href="#" target="_blank" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-extrabold text-center shadow-md flex items-center justify-center gap-2 transition-all">
            <i class="fa-brands fa-whatsapp text-base"></i> Konfirmasi ke WhatsApp Admin SayaBantu
        </a>

        <button type="button" onclick="closeAllCustomerModals()" class="w-full py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl text-center transition-all">
            Tutup & Pantau di Lacak
        </button>

    </div>

</div>


{{-- =====================================================
     7. MODAL LACAK SURUHAN
====================================================== --}}
<div id="modalLacakPesanan" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[390px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200">
    
    <div class="bg-[#0E1D31] text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-file-lines text-sky-400"></i>
            <h3 class="text-sm font-bold">Lacak Status Suruhan</h3>
        </div>
        <button type="button" onclick="closeAllCustomerModals()" class="text-slate-400 hover:text-white p-1">
            <i class="fa-solid fa-xmark text-base"></i>
        </button>
    </div>

    <div class="p-4 space-y-3 text-xs">
        <div class="flex gap-2">
            <input type="text" id="inputLacakKode" placeholder="Contoh: #SB-SURUH-9012" class="flex-1 px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-[#173B67]">
            <button type="button" onclick="showCustomerToast('Lacak Suruhan', 'Mengecek status tiket suruhan di server...', 'info')" class="px-3.5 py-2 bg-[#173B67] text-white font-bold rounded-xl hover:bg-[#0E1D31]">
                Cek
            </button>
        </div>

        {{-- CONTOH ORDER AKTIF --}}
        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 space-y-2">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-[9px] font-extrabold px-2 py-0.5 rounded-full bg-amber-100 text-amber-800">Mitra Otomatis Ditugaskan</span>
                    <h4 class="font-bold text-slate-900 mt-1">Full Home Cleaning (2 Kamar)</h4>
                    <span class="text-[10px] text-slate-500">Tiket: #SB-SURUH-9012 • Hari Ini 16:30 WIB</span>
                </div>
                <strong class="text-xs text-slate-900">Rp 85.000</strong>
            </div>

            <div class="pt-2 border-t border-slate-200 space-y-1.5 text-[10px]">
                <div class="flex items-center gap-1.5 text-emerald-700 font-bold">
                    <i class="fa-solid fa-circle-check"></i> Pesanan diterima sistem SayaBantu
                </div>
                <div class="flex items-center gap-1.5 text-emerald-700 font-bold">
                    <i class="fa-solid fa-circle-check"></i> Mitra ditugaskan otomatis: Bambang Sutrisno (★ 4.9)
                </div>
                <div class="flex items-center gap-1.5 text-amber-700 font-bold animate-pulse">
                    <i class="fa-solid fa-motorcycle"></i> Mitra dalam perjalanan menuju alamat Anda (Est. 10 Mnt)
                </div>
            </div>
        </div>
    </div>

</div>


{{-- =====================================================
     8. MODAL NOTIFIKASI
====================================================== --}}
<div id="modalNotifCustomer" class="fixed inset-x-4 bottom-8 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 max-w-[390px] w-full mx-auto bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden border border-slate-200">
    <div class="bg-[#0E1D31] text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <i class="fa-regular fa-bell text-sky-400 text-sm"></i>
            <h3 class="text-sm font-bold">Pusat Notifikasi</h3>
        </div>
        <button type="button" onclick="closeAllCustomerModals()" class="text-slate-400 hover:text-white p-1">
            <i class="fa-solid fa-xmark text-base"></i>
        </button>
    </div>
    <div class="p-4 space-y-2.5 text-xs max-h-[60vh] overflow-y-auto">
        <div class="p-3 bg-blue-50/70 border border-blue-100 rounded-xl space-y-1">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold text-sky-700">Promo Member VIP</span>
                <span class="text-[9px] text-slate-400">5 mnt lalu</span>
            </div>
            <p class="text-[11px] text-slate-800 leading-snug">Diskon 10% otomatis diterapkan untuk pemesanan suruhan Full Home Cleaning.</p>
        </div>
        <div class="p-3 bg-slate-50 border border-slate-200 rounded-xl space-y-1">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold text-emerald-700">Mitra di Area Anda</span>
                <span class="text-[9px] text-slate-400">1 jam lalu</span>
            </div>
            <p class="text-[11px] text-slate-800 leading-snug">10+ mitra personil standby di Jabodetabek siap menerima penugasan otomatis.</p>
        </div>
    </div>
</div>


{{-- =====================================================
     9. TOAST NOTIFICATION
====================================================== --}}
<div id="customerToast" class="fixed top-5 left-1/2 -translate-x-1/2 max-w-[360px] w-full px-4 z-50 pointer-events-none transition-all duration-300 opacity-0 -translate-y-4">
    <div class="bg-slate-900/95 text-white backdrop-blur-md rounded-2xl p-3 shadow-xl border border-white/20 flex items-center gap-3">
        <div id="customerToastIcon" class="w-7 h-7 rounded-xl bg-sky-500 text-white flex items-center justify-center shrink-0 text-xs">
            <i class="fa-solid fa-info"></i>
        </div>
        <div class="flex-1 min-w-0">
            <h5 id="customerToastTitle" class="text-xs font-bold leading-tight truncate">Info</h5>
            <p id="customerToastMessage" class="text-[11px] text-slate-300 leading-snug mt-0.5 truncate">Pesan informasi</p>
        </div>
    </div>
</div>


<script>
    // State Auth Customer & Mitra
    const AUTH_KEY = 'sb_customer_auth';

    function getCustomerAuth() {
        try {
            const data = localStorage.getItem(AUTH_KEY);
            return data ? JSON.parse(data) : null;
        } catch (e) {
            return null;
        }
    }

    function setCustomerAuth(user) {
        localStorage.setItem(AUTH_KEY, JSON.stringify(user));
        refreshCustomerAuthUI();
    }

    function clearCustomerAuth() {
        localStorage.removeItem(AUTH_KEY);
        refreshCustomerAuthUI();
    }

    // Role Switcher in Login Modal
    let currentLoginRole = 'customer';
    function switchLoginRole(role) {
        currentLoginRole = role;
        const btnCust = document.getElementById('tabBtnCustomer');
        const btnMitra = document.getElementById('tabBtnMitra');
        const contentCust = document.getElementById('roleContentCustomer');
        const contentMitra = document.getElementById('roleContentMitra');
        const title = document.getElementById('loginModalTitle');

        if (role === 'mitra') {
            btnMitra.className = 'py-1.5 rounded-lg transition-all text-center bg-white text-emerald-900 shadow-xs flex items-center justify-center gap-1.5';
            btnCust.className = 'py-1.5 rounded-lg transition-all text-center text-slate-300 hover:text-white flex items-center justify-center gap-1.5';
            contentMitra.classList.remove('hidden');
            contentCust.classList.add('hidden');
            if (title) title.innerText = 'Masuk Portal Mitra';
        } else {
            btnCust.className = 'py-1.5 rounded-lg transition-all text-center bg-white text-[#0E1D31] shadow-xs flex items-center justify-center gap-1.5';
            btnMitra.className = 'py-1.5 rounded-lg transition-all text-center text-slate-300 hover:text-white flex items-center justify-center gap-1.5';
            contentCust.classList.remove('hidden');
            contentMitra.classList.add('hidden');
            if (title) title.innerText = 'Masuk Akun Customer';
        }
    }

    // Quick Login Actions
    function quickLoginCustomerAction(name, phone) {
        setCustomerAuth({
            isLoggedIn: true,
            role: 'customer',
            name: name,
            phone: phone
        });
        closeAllCustomerModals();
        showCustomerToast('Berhasil Masuk', `Selamat datang, ${name}! Mode VIP Customer aktif. Kontak WhatsApp CS telah terbuka.`, 'success');
    }

    function quickLoginMitraAction(name, phone, specialty) {
        setCustomerAuth({
            isLoggedIn: true,
            role: 'mitra',
            name: name,
            phone: phone,
            specialty: specialty,
            rating: '4.9',
            balance: '450.000'
        });
        closeAllCustomerModals();
        showCustomerToast('Mitra Aktif', `Halo Mitra ${name}! Status Online aktif. Kontak WhatsApp Dispatcher telah terbuka.`, 'success');
    }

    function handleManualCustomerLogin(e) {
        e.preventDefault();
        const phone = document.getElementById('inputLoginCustomerPhone').value.trim();
        if (!phone) {
            showCustomerToast('Lengkapi Data', 'Masukkan nomor WhatsApp aktif', 'warning');
            return;
        }
        quickLoginCustomerAction('Budi Santoso', phone);
    }

    function handleManualMitraLogin(e) {
        e.preventDefault();
        const phone = document.getElementById('inputLoginMitraPhone').value.trim();
        if (!phone) {
            showCustomerToast('Lengkapi Data', 'Masukkan ID Mitra atau nomor WhatsApp', 'warning');
            return;
        }
        quickLoginMitraAction('Bambang Sutrisno', phone, 'Pindahan & Home Cleaning');
    }

    function logoutUserAction() {
        clearCustomerAuth();
        closeAllCustomerModals();
        showCustomerToast('Keluar Akun', 'Anda telah keluar. Kembali ke mode pengunjung tamu.', 'info');
    }

    // Gated WhatsApp Handler (Hanya Muncul/Bisa Diakses Setelah Jadi Customer atau Mitra!)
    function handleWaGatedClick() {
        const user = getCustomerAuth();
        if (user && user.isLoggedIn) {
            if (user.role === 'mitra') {
                window.open('https://wa.me/6281234567890?text=Halo%20Dispatcher%20SayaBantu%2C%20saya%20Mitra%20' + encodeURIComponent(user.name) + '%20siap%20menerima%20penugasan.', '_blank');
            } else {
                window.open('https://wa.me/6281234567890?text=Halo%20SayaBantu%2C%20saya%20Customer%20' + encodeURIComponent(user.name) + '%20butuh%20bantuan%20suruhan.', '_blank');
            }
        } else {
            openModal('modalWaGatedNotice');
            showCustomerToast('WhatsApp Terkunci', 'Masuk sebagai Customer atau Mitra untuk mengakses WhatsApp resmi.', 'warning');
        }
    }

    // Open Partner Detail Modal
    function openBocahModal(name, photo, specialty, rating, region) {
        const photoEl = document.getElementById('bocahDetailPhoto');
        const nameEl = document.getElementById('bocahDetailName');
        const specEl = document.getElementById('bocahDetailSpecialty');
        const ratingEl = document.getElementById('bocahDetailRating');
        const regionEl = document.getElementById('bocahDetailRegion');

        if (photoEl) photoEl.src = photo;
        if (nameEl) nameEl.innerText = name;
        if (specEl) specEl.innerText = specialty;
        if (ratingEl) ratingEl.innerText = rating;
        if (regionEl) regionEl.innerText = region;

        openModal('modalDetailBocah');
    }

    // Refresh UI Customer & Mitra (Guest vs Customer vs Mitra)
    function refreshCustomerAuthUI() {
        const user = getCustomerAuth();
        const headerBtn = document.getElementById('headerAccountBtn');
        const headerLoginBtn = document.getElementById('headerLoginBtn');

        const isLoggedIn = !!(user && user.isLoggedIn);

        // Tombol publik: Masuk & profil hanya tampil setelah login.
        if (headerLoginBtn) headerLoginBtn.classList.toggle('hidden', isLoggedIn);
        if (headerBtn) headerBtn.classList.toggle('hidden', !isLoggedIn);

        // Header versi mobile (dipakai halaman mitra & detail layanan)
        const mLoginBtn = document.getElementById('mobileHeaderLoginBtn');
        const mProfileBtn = document.getElementById('mobileHeaderProfileBtn');
        const mWallet = document.getElementById('mobileHeaderWallet');
        if (mLoginBtn) mLoginBtn.classList.toggle('hidden', isLoggedIn);
        if (mProfileBtn) mProfileBtn.classList.toggle('hidden', !isLoggedIn);
        if (mWallet) {
            mWallet.classList.toggle('hidden', !isLoggedIn);
            mWallet.classList.toggle('flex', isLoggedIn);
        }

        // Greeting cards
        const guestGreeting = document.getElementById('guestGreetingCard');
        const vipGreeting = document.getElementById('vipGreetingCard');
        const mitraGreeting = document.getElementById('mitraGreetingCard');

        // Specific widgets
        const vipWallet = document.getElementById('vipWalletCard');
        const vipOrderTracker = document.getElementById('vipActiveOrderCard');
        const mitraDashboardCard = document.getElementById('mitraDashboardCard');
        const memberBadgeForm = document.getElementById('vipBadgeForm');
        const formAlamat = document.getElementById('formAlamat');

        if (user && user.isLoggedIn) {

            if (user.role === 'mitra') {
                // LOGGED IN AS MITRA
                if (headerBtn) {
                    headerBtn.innerHTML = `
                        <div class="w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs border border-emerald-300 shadow-sm">
                            <i class="fa-solid fa-helmet-safety text-[12px]"></i>
                        </div>
                    `;
                }
                if (guestGreeting) guestGreeting.classList.add('hidden');
                if (vipGreeting) vipGreeting.classList.add('hidden');
                if (mitraGreeting) mitraGreeting.classList.remove('hidden');

                if (vipWallet) vipWallet.classList.add('hidden');
                if (vipOrderTracker) vipOrderTracker.classList.add('hidden');
                if (mitraDashboardCard) mitraDashboardCard.classList.remove('hidden');
                if (memberBadgeForm) memberBadgeForm.classList.add('hidden');

                const mName = document.getElementById('mitraGreetingName');
                if (mName) mName.innerText = user.name;
                const profM = document.getElementById('profMitraName');
                if (profM) profM.innerText = user.name;

            } else {
                // LOGGED IN AS CUSTOMER
                if (headerBtn) {
                    headerBtn.innerHTML = `
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-sky-400 to-blue-600 text-white flex items-center justify-center font-bold text-xs border border-white/40 shadow-sm">
                            ${user.name ? user.name.charAt(0) : 'C'}
                        </div>
                    `;
                }
                if (guestGreeting) guestGreeting.classList.add('hidden');
                if (mitraGreeting) mitraGreeting.classList.add('hidden');
                if (vipGreeting) vipGreeting.classList.remove('hidden');

                if (vipWallet) vipWallet.classList.remove('hidden');
                if (vipOrderTracker) vipOrderTracker.classList.remove('hidden');
                if (mitraDashboardCard) mitraDashboardCard.classList.add('hidden');
                if (memberBadgeForm) memberBadgeForm.classList.remove('hidden');

                const vipNameText = document.getElementById('vipUserNameText');
                if (vipNameText) vipNameText.innerText = user.name;
                const profC = document.getElementById('profCustomerName');
                if (profC) profC.innerText = user.name;

                if (formAlamat && !formAlamat.value) {
                    formAlamat.value = "Jl. Sudirman No. 12, Jakarta Pusat (Rumah)";
                }
            }

        } else {
            // GUEST / NOT LOGGED IN
            if (headerBtn) {
                headerBtn.innerHTML = `<i class="fa-regular fa-user text-[15px]"></i>`;
            }
            if (guestGreeting) guestGreeting.classList.remove('hidden');
            if (vipGreeting) vipGreeting.classList.add('hidden');
            if (mitraGreeting) mitraGreeting.classList.add('hidden');

            if (vipWallet) vipWallet.classList.add('hidden');
            if (vipOrderTracker) vipOrderTracker.classList.add('hidden');
            if (mitraDashboardCard) mitraDashboardCard.classList.add('hidden');
            if (memberBadgeForm) memberBadgeForm.classList.add('hidden');
        }

        if (typeof updateDrawerProfileUI === 'function') {
            updateDrawerProfileUI();
        }
    }

    // Modal Helpers
    function openModal(id) {
        document.getElementById('customerBackdrop').classList.remove('hidden');
        const el = document.getElementById(id);
        if (el) el.classList.remove('hidden');
    }

    function closeAllCustomerModals() {
        document.getElementById('customerBackdrop').classList.add('hidden');
        const modals = [
            'modalLoginCustomer', 
            'modalDaftarCustomer',
            'modalProfileCustomer',
            'modalProfileMitra',
            'modalWaGatedNotice',
            'modalDetailBocah',
            'modalKonfirmasiOrder',
            'modalLacakPesanan',
            'modalNotifCustomer'
        ];
        modals.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        });
    }

    // Masuk / Daftar lewat Google (placeholder — belum terhubung penyedia OAuth)
    function handleGoogleAuth(mode) {
        closeAllCustomerModals();
        const aksi = mode === 'daftar' ? 'Pendaftaran' : 'Masuk';
        showCustomerToast('Google', aksi + ' dengan Google belum terhubung. Silakan gunakan nomor WhatsApp terlebih dahulu.', 'info');
    }

    // Pendaftaran akun customer baru
    function handleManualDaftarCustomer(e) {
        e.preventDefault();
        const namaEl = document.getElementById('inputDaftarNama');
        const phoneEl = document.getElementById('inputDaftarPhone');
        const nama = namaEl ? namaEl.value.trim() : '';
        const phone = phoneEl ? phoneEl.value.trim() : '';

        if (!nama || !phone) {
            showCustomerToast('Lengkapi Data', 'Nama dan nomor WhatsApp wajib diisi.', 'warning');
            return;
        }

        setCustomerAuth({
            isLoggedIn: true,
            role: 'customer',
            name: nama,
            phone: phone
        });
        closeAllCustomerModals();
        showCustomerToast('Akun Dibuat', `Selamat datang, ${nama}! Akun Anda berhasil dibuat.`, 'success');
    }

    function handleAccountButtonClick() {
        const user = getCustomerAuth();
        if (user && user.isLoggedIn) {
            if (user.role === 'mitra') {
                openModal('modalProfileMitra');
            } else {
                openModal('modalProfileCustomer');
            }
        } else {
            openModal('modalLoginCustomer');
        }
    }

    // Toast Notification
    let toastCustomerTimeout;
    function showCustomerToast(title, msg, type = 'info') {
        const toast = document.getElementById('customerToast');
        const titleEl = document.getElementById('customerToastTitle');
        const msgEl = document.getElementById('customerToastMessage');
        const iconEl = document.getElementById('customerToastIcon');

        if (!toast || !titleEl || !msgEl || !iconEl) return;

        titleEl.innerText = title;
        msgEl.innerText = msg;

        if (type === 'success') {
            iconEl.className = 'w-7 h-7 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0 text-xs';
            iconEl.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
        } else if (type === 'warning') {
            iconEl.className = 'w-7 h-7 rounded-xl bg-amber-500 text-white flex items-center justify-center shrink-0 text-xs';
            iconEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
        } else {
            iconEl.className = 'w-7 h-7 rounded-xl bg-sky-500 text-white flex items-center justify-center shrink-0 text-xs';
            iconEl.innerHTML = '<i class="fa-solid fa-info"></i>';
        }

        toast.classList.remove('opacity-0', '-translate-y-4');
        toast.classList.add('opacity-100', 'translate-y-0');

        clearTimeout(toastCustomerTimeout);
        toastCustomerTimeout = setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            toast.classList.add('opacity-0', '-translate-y-4');
        }, 3000);
    }

    document.addEventListener('DOMContentLoaded', function() {
        refreshCustomerAuthUI();
    });
</script>
