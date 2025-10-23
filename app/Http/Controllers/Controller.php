<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 *
 * Base Controller untuk semua Controller di sistem FRS.
 * Berisi trait umum seperti:
 *  - AuthorizesRequests: otorisasi tindakan pengguna
 *  - DispatchesJobs: menjalankan job queue
 *  - ValidatesRequests: validasi data input
 *
 * Semua controller lain seperti AdminController, StudentController, dsb
 * akan mewarisi class ini.
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Kirim response sukses JSON (untuk API atau AJAX)
     *
     * @param string $message
     * @param mixed $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse(string $message, $data = null, int $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $status);
    }

    /**
     * Kirim response error JSON (untuk API atau AJAX)
     *
     * @param string $message
     * @param int $status
     * @param mixed $errors
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse(string $message, int $status = 400, $errors = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors
        ], $status);
    }

    /**
     * Helper global untuk redirect dengan notifikasi flash
     *
     * @param string $route
     * @param string $message
     * @param string $type
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectWithMessage(string $route, string $message, string $type = 'success')
    {
        return redirect()->route($route)->with($type, $message);
    }
}
