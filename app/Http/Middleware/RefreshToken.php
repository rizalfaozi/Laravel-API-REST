<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Middleware\RefreshToken as Refresh;

class RefreshToken extends Refresh {
	protected function respond($event, $error, $status, $payload = [])
    {
        $response = $this->events->fire($event, $payload, true);

        return $response ?: $this->response->json(['success' => false, 'message' => $error], $status);
    }
}