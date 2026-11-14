<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CourierSetting;
use App\Services\Courier\FraudCheckerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FraudCheckController extends Controller
{

    public function index()
    {
        $settings = CourierSetting::whereIn('courier', [
            'pathao',
            'steadfast',
            'redx',
        ])->get()->keyBy('courier');

        return view('dashboard.courier.fraud.index', compact('settings'));
    }


    public function check(
        Request $request,
        FraudCheckerService $fraudChecker
    ) {
        $validator = Validator::make($request->all(), [
            'phone' => [
                'required',
                'string',
                'regex:/^(?:\+?88)?01[3-9]\d{8}$/',
            ],
        ], [
            'phone.required' => 'Customer phone number is required.',
            'phone.regex' => 'Please enter a valid Bangladesh mobile number.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $result = $fraudChecker->check($request->phone);

        return view('dashboard.courier.fraud.check', compact('result'))
            ->with('phone', $request->phone);
    }
}
