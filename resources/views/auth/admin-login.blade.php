<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Masuk Admin - SayaBantu.com</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * { box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        body { font-family: 'Inter', sans-serif; background: #E5E7EB; color: #111827; margin: 0; padding: 0; }
        .mobile-app {
            width: 100%;
            max-width: 430px;
            min-height: 100vh;
            margin: 0 auto;
            position: relative;
            overflow-x: hidden;
            background: #F7F9FC;
            box-shadow: 0 0 40px rgba(15,23,42,0.14);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .admin-login-top-area {
            position: relative;
            overflow: hidden;
            color: white;
            background:
                radial-gradient(circle at 92% 4%, rgba(255,255,255,0.10), transparent 27%),
                radial-gradient(circle at 0% 42%, rgba(75,110,140,0.20), transparent 32%),
                linear-gradient(180deg, #070E18 0%, #0E1D31 38%, #17334C 70%, #F7F9FC 100%);
            padding: 24px 20px 48px;
        }
    </style>
</head>
<body>

<div class="mobile-app">
    
    <div>
        {{-- HEADER GRADIENT --}}
        <div class="admin-login-top-area">
            <div class="flex items-center justify-between">
                <a href="{{ route('customer.index') }}" class="inline-flex items-center gap-1.5 text-xs text-white/80 hover:text-white font-medium transition-colors">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i> Beranda Publik
                </a>
                <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-amber-500/20 text-amber-300 border border-amber-400/30 flex items-center gap-1">
                    <i class="fa-solid fa-shield-halved text-[9px]"></i> Super Admin
                </span>
            </div>

            <div class="mt-8 text-center">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#173B67] to-[#0E1D31] flex items-center justify-center text-white font-black text-lg shadow-lg mx-auto border border-white/20">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <h2 class="text-xl font-extrabold text-white mt-3">Portal Admin SayaBantu</h2>
                <p class="text-xs text-white/70 mt-1">Akses khusus manajemen pesanan, mitra & pembayaran</p>
            </div>
        </div>

        {{-- FORM LOGIN CARD --}}
        <div class="px-5 -mt-6 relative z-10 space-y-4">
            
            {{-- FAST 1-CLICK DEMO LOGIN BUTTON --}}
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block text-center">
                    Akses Cepat Pengujian
                </span>
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="w-full py-2.5 px-3 rounded-xl bg-[#0E1D31] hover:bg-[#173B67] text-white font-bold text-xs shadow-sm flex items-center justify-center gap-2 transition-all"
                >
                    <i class="fa-solid fa-shield-check text-sky-400"></i> Masuk Cepat sebagai Super Admin
                </a>
            </div>

            {{-- MANUAL FORM --}}
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3.5 text-xs">
                
                <form action="{{ route('admin.dashboard') }}" method="GET" class="space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Email Administrator</label>
                        <input 
                            type="email" 
                            value="admin@sayabantu.com" 
                            class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Kata Sandi Master</label>
                        <input 
                            type="password" 
                            value="admin123" 
                            class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                            required
                        >
                    </div>

                    <button 
                        type="submit" 
                        class="w-full py-3 rounded-xl bg-[#173B67] hover:bg-[#0E1D31] text-white font-bold text-xs shadow-sm transition-all flex items-center justify-center gap-2"
                    >
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Masuk ke Dashboard
                    </button>
                </form>

            </div>

        </div>
    </div>

    {{-- FOOTER SWITCHER TO CUSTOMER --}}
    <div class="p-5 text-center text-xs text-slate-500">
        <p>Bukan Administrator?</p>
        <a href="{{ route('customer.login') }}" class="text-[#173B67] font-bold hover:underline">
            Masuk sebagai Customer »
        </a>
    </div>

</div>

</body>
</html>
