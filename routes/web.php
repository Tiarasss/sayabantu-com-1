<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| HALAMAN CUSTOMER & BERANDA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('customer.index');
})->name('customer.home');

Route::get('/pengunjung', function () {
    return view('customer.index');
})->name('customer.index');

Route::redirect('/customer', '/pengunjung');

Route::get('/customer/layanan', function (Request $request) {
    return view('customer.service-detail', [
        'serviceName' => $request->string('name')->trim()->value() ?: 'Layanan SayaBantu',
        'serviceDescription' => $request->string('description')->trim()->value() ?: 'Layanan bantuan sesuai kebutuhan Anda.',
        'serviceBudget' => $request->string('budget')->trim()->value() ?: 'Menyesuaikan kebutuhan',
    ]);
})->name('customer.service');

/*
|--------------------------------------------------------------------------
| HALAMAN KATALOG LAYANAN LENGKAP (PUBLIK)
|--------------------------------------------------------------------------
| Beranda hanya menampilkan beberapa layanan unggulan. Semua layanan
| (16 kategori) tersedia di halaman ini.
*/
Route::get('/layanan', function () {
    return view('customer.layanan');
})->name('customer.layanan');

Route::get('/customer/mitra', function () {
    return view('customer.mitra');
})->name('customer.mitra');

/*
|--------------------------------------------------------------------------
| HALAMAN INFORMASI (TENTANG, CARA KERJA, SYARAT, PRIVASI)
|--------------------------------------------------------------------------
*/
Route::get('/tentang', function () {
    return view('customer.tentang');
})->name('customer.tentang');

Route::get('/cara-kerja', function () {
    return view('customer.cara-kerja');
})->name('customer.cara-kerja');

Route::get('/syarat-ketentuan', function () {
    return view('customer.syarat-ketentuan');
})->name('customer.syarat-ketentuan');

Route::get('/kebijakan-privasi', function () {
    return view('customer.kebijakan-privasi');
})->name('customer.kebijakan-privasi');

Route::get('/login', function () {
    return view('auth.customer-login');
})->name('customer.login');

Route::get('/customer/login', function () {
    return view('auth.customer-login');
});

Route::get('/admin/login', function () {
    return view('auth.admin-login');
})->name('admin.login');

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});


use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminRealtimeController;

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
| Catatan: JANGAN pakai Route::domain() untuk memisah port. Laravel dan
| Symfony mencocokkan host TANPA port (Illuminate\Routing\Matching\
| HostValidator memakai $request->getHost()), jadi domain "host:port"
| tidak akan pernah cocok dan semua route admin jadi 404.
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Web Pages
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/pesanan', [AdminDashboardController::class, 'pesanan'])->name('pesanan');
    Route::get('/pesanan/{id}', [AdminDashboardController::class, 'pesananDetail'])->name('pesanan.detail');
    Route::get('/pembayaran', [AdminDashboardController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/pembayaran/{id}', [AdminDashboardController::class, 'pembayaranDetail'])->name('pembayaran.detail');
    Route::get('/konflik', [AdminDashboardController::class, 'konflik'])->name('konflik');
    Route::get('/mitra', [AdminDashboardController::class, 'mitra'])->name('mitra');
    Route::get('/pengguna', [AdminDashboardController::class, 'pengguna'])->name('pengguna');
    Route::get('/review', [AdminDashboardController::class, 'review'])->name('review');
    Route::get('/profile', [AdminDashboardController::class, 'profile'])->name('profile');

    // Realtime API Endpoints
    Route::prefix('api')->name('api.')->group(function () {
        Route::get('/realtime-state', [AdminRealtimeController::class, 'getState'])->name('realtime.state');
        Route::get('/stream', [AdminRealtimeController::class, 'stream'])->name('realtime.stream');
        Route::post('/orders/{id}/status', [AdminRealtimeController::class, 'updateOrderStatus'])->name('orders.status');
        Route::post('/simulate-event', [AdminRealtimeController::class, 'simulateEvent'])->name('realtime.simulate');
        Route::post('/notifications/read', [AdminRealtimeController::class, 'markNotificationsRead'])->name('notifications.read');
    });

});