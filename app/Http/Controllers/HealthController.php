<?php

namespace App\Http\Controllers;

class HealthController extends Controller
{
    /**
     * Check API health
     * @OA\Get (
     *     path="/api/v1/health",
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *     )
     * )
     */
    public function check(): array
    {
        return [
            'status' => 'OK',
            'timestamp' => date('Y-m-d H:i:s', time()),
            'php-version' => (float)phpversion()
        ];
    }
}
