<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminRealtimeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminRealtimeController extends Controller
{
    protected AdminRealtimeService $realtimeService;

    public function __construct(AdminRealtimeService $realtimeService)
    {
        $this->realtimeService = $realtimeService;
    }

    /**
     * Endpoint snapshot state realtime untuk Admin
     */
    public function getState()
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->realtimeService->getState(),
        ]);
    }

    /**
     * Server-Sent Events (SSE) Stream untuk pembaruan realtime
     */
    public function stream(Request $request): StreamedResponse
    {
        $response = new StreamedResponse(function () {
            // Hindari buffering
            if (ob_get_level() > 0) {
                ob_end_clean();
            }

            // Kirim snapshot pertama kali
            $initialState = $this->realtimeService->getState();
            echo "event: initial_state\n";
            echo 'data: ' . json_encode($initialState) . "\n\n";
            flush();

            $lastKnownUpdate = $initialState['last_updated'] ?? time();
            $loops = 0;

            // Loop streaming (maksimal 25 detik agar kompatibel dengan timeout web server)
            while ($loops < 25) {
                if (connection_aborted()) {
                    break;
                }

                $currentState = $this->realtimeService->getState();
                $currentUpdate = $currentState['last_updated'] ?? time();

                if ($currentUpdate > $lastKnownUpdate) {
                    $lastKnownUpdate = $currentUpdate;
                    echo "event: state_updated\n";
                    echo 'data: ' . json_encode($currentState) . "\n\n";
                    flush();
                } else {
                    // Kirim heartbeat setiap 3 detik
                    echo ": heartbeat\n\n";
                    flush();
                }

                sleep(2);
                $loops += 2;
            }
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Connection', 'keep-alive');
        $response->headers->set('X-Accel-Buffering', 'no');

        return $response;
    }

    /**
     * Update status pesanan live
     */
    public function updateOrderStatus(Request $request, string $id)
    {
        $status = $request->input('status', 'Diproses');
        $state = $this->realtimeService->updateOrderStatus($id, $status);

        return response()->json([
            'status' => 'success',
            'message' => "Status pesanan {$id} berhasil diubah menjadi {$status}",
            'data' => $state,
        ]);
    }

    /**
     * Simulasi event realtime (order baru, bayar, rating, dsb)
     */
    public function simulateEvent(Request $request)
    {
        $type = $request->input('type', 'random');
        $result = $this->realtimeService->simulateEvent($type);

        return response()->json([
            'status' => 'success',
            'message' => "Simulasi event '{$type}' berhasil dipicu",
            'data' => $result,
        ]);
    }

    /**
     * Tandai notifikasi telah dibaca
     */
    public function markNotificationsRead()
    {
        $state = $this->realtimeService->markNotificationsRead();

        return response()->json([
            'status' => 'success',
            'data' => $state,
        ]);
    }
}
