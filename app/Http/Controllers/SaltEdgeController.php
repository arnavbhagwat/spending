<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaltEdgeController extends Controller
{
    protected $appId;
    protected $secret;

    public function __construct()
    {
        $this->appId = config('services.saltedge.app_id');
        $this->secret = config('services.saltedge.secret');
    }

    public function createCustomer(Request $request)
    {
        $identifier = $request->user()->email ?? 'demo_user_' . uniqid();

        $response = Http::withHeaders([
            'App-id' => $this->appId,
            'Secret' => $this->secret,
            'Content-Type' => 'application/json',
        ])->post('https://api.saltedge.com/api/v5/customers', [
            'data' => [
                'identifier' => $identifier
            ]
        ]);

        return response()->json($response->json());
    }
}
