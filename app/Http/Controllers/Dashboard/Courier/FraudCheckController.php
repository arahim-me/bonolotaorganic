<?php

namespace App\Http\Controllers\Dashboard\Courier;

use App\Http\Controllers\Controller;
use App\Models\CourierFraudCheck;
use App\Services\Courier\Fraud\FraudCheckerService;
use Illuminate\Http\Request;

class FraudCheckController extends Controller
{
    public function index()
    {
        $checks = CourierFraudCheck::latest()
            ->paginate(20);

        return view(
            'dashboard.courier.fraud.index',
            compact('checks')
        );
    }

    public function check(
        Request $request,
        FraudCheckerService $service
    ) {
        $validated = $request->validate([
            'phone' => ['required', 'regex:/^(?:\+?88)?01[3-9]\d{8}$/'],
        ]);

        try {
            $result = $service->check($validated['phone']);

            $check = CourierFraudCheck::create([
                'phone' => $result['phone'],
                'provider' => 'multiple',
                'result' => $result,
                'checked_at' => now(),
                'risk_level' => 'unknown',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Fraud check completed.',
                'data' => $check->result,
            ]);

        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }
}
