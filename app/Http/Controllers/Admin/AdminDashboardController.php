<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminRealtimeService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected AdminRealtimeService $realtimeService;

    public function __construct(AdminRealtimeService $realtimeService)
    {
        $this->realtimeService = $realtimeService;
    }

    /**
     * Dashboard Utama Admin
     */
    public function dashboard()
    {
        $state = $this->realtimeService->getState();

        return view('admin.dashboard', [
            'totalPesanan' => $state['stats']['total_pesanan'] ?? 0,
            'totalPembayaran' => $state['stats']['total_pembayaran'] ?? 0,
            'totalPengguna' => $state['stats']['total_pengguna'] ?? 0,
            'totalKonflik' => $state['stats']['total_konflik'] ?? 0,
            'recentOrders' => $state['recent_orders'] ?? [],
            'recentActivities' => $state['recent_activities'] ?? [],
            'stats' => $state['stats'] ?? [],
        ]);
    }

    /**
     * Halaman Kelola Seluruh Pesanan
     */
    public function pesanan(Request $request)
    {
        $state = $this->realtimeService->getState();

        return view('admin.pesanan.index', [
            'orders' => $state['recent_orders'] ?? [],
            'stats' => $state['stats'] ?? [],
        ]);
    }

    /**
     * Halaman Detail Pesanan
     */
    public function pesananDetail($id)
    {
        $state = $this->realtimeService->getState();
        $order = collect($state['recent_orders'])->firstWhere('id', $id) ?? [
            'id' => $id,
            'service' => 'Full Home Cleaning',
            'customer' => 'Siti Rahma',
            'mitra' => 'Budi Santoso',
            'amount' => 'Rp 150.000',
            'status' => 'Diproses',
            'status_class' => 'status-warning',
            'icon' => 'fa-broom',
            'icon_class' => 'icon-blue',
            'created_at' => '10 menit lalu',
        ];

        return view('admin.pesanan.detail', [
            'id' => $id,
            'order' => $order,
        ]);
    }

    /**
     * Halaman Kelola Seluruh Pembayaran
     */
    public function pembayaran()
    {
        $state = $this->realtimeService->getState();

        return view('admin.pembayaran.index', [
            'stats' => $state['stats'] ?? [],
            'recentActivities' => $state['recent_activities'] ?? [],
        ]);
    }

    /**
     * Halaman Detail Pembayaran
     */
    public function pembayaranDetail($id)
    {
        return view('admin.pembayaran.detail', [
            'id' => $id,
        ]);
    }

    /**
     * Halaman Pusat Mediasi & Konflik
     */
    public function konflik()
    {
        $state = $this->realtimeService->getState();

        return view('admin.konflik.index', [
            'stats' => $state['stats'] ?? [],
        ]);
    }

    /**
     * Halaman Data Mitra
     */
    public function mitra()
    {
        $state = $this->realtimeService->getState();

        return view('admin.mitra.index', [
            'stats' => $state['stats'] ?? [],
        ]);
    }

    /**
     * Halaman Data Pengguna
     */
    public function pengguna()
    {
        $state = $this->realtimeService->getState();

        return view('admin.pengguna.index', [
            'stats' => $state['stats'] ?? [],
        ]);
    }

    /**
     * Halaman Review & Ulasan
     */
    public function review()
    {
        $state = $this->realtimeService->getState();

        return view('admin.review.index', [
            'stats' => $state['stats'] ?? [],
        ]);
    }

    /**
     * Halaman Profil Admin
     */
    public function profile()
    {
        return view('admin.profile');
    }
}
