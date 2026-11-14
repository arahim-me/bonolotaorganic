<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CourierSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Log;
use Throwable;

class CourierSettingController extends Controller
{
    public function index()
    {
        // Courier Configuration
        $couriers = [
            'pathao' => [
                'name' => 'Pathao',
                'base_url' => 'https://courier-api-sandbox.pathao.com',
            ],

            'steadfast' => [
                'name' => 'Steadfast',
                'base_url' => 'https://portal.packzy.com/api/v1',
            ],

            'redx' => [
                'name' => 'RedX',
                'base_url' => 'https://openapi.redx.com.bd/v1.0.0-beta',
            ],
        ];

        // Create default courier settings if not exists
        foreach ($couriers as $key => $data) {

            CourierSetting::firstOrCreate(
                [
                    'courier' => $key,
                ],
                [
                    'name' => $data['name'],
                    'base_url' => $data['base_url'],
                    'is_active' => false,
                    'connection_status' => 'untested',
                    'last_tested_at' => null,
                    'last_error' => null,
                ]
            );
        }

        // Get all courier settings
        $settings = CourierSetting::whereIn(
            'courier',
            array_keys($couriers)
        )
            ->get()
            ->keyBy('courier');

        // Individual courier settings
        $pathao = $settings->get('pathao');
        $steadfast = $settings->get('steadfast');
        $redx = $settings->get('redx');

        return view(
            'dashboard.courier.settings.index',
            compact(
                'settings',
                'pathao',
                'steadfast',
                'redx'
            )
        );
    }


    public function testConnection(string $courier)
    {
        abort_unless(
            in_array($courier, ['pathao', 'steadfast', 'redx']),
            404
        );

        $setting = CourierSetting::where('courier', $courier)
            ->firstOrFail();

        try {

            if ($courier === 'pathao') {

                $response = $this->testPathao($setting);

                $setting->access_token = $response->json('access_token');

            } elseif ($courier === 'steadfast') {

                $response = $this->testSteadfast($setting);

            } elseif ($courier === 'redx') {

                $response = $this->testRedx($setting);

            }

            $setting->connection_status = 'connected';
            $setting->last_tested_at = now();
            $setting->last_error = null;
            $setting->save();

            return back()->with(
                'success',
                $setting->name . ' API connection successful.'
            );

        } catch (Throwable $e) {

            $setting->connection_status = 'failed';
            $setting->last_tested_at = now();
            $setting->last_error = $e->getMessage();
            $setting->save();

            Log::error('Courier API Connection Failed', [
                'courier' => $courier,
                'error' => $e->getMessage(),
            ]);

            return back()->with(
                'error',
                $setting->name . ' connection failed: ' . $e->getMessage()
            );
        }
    }


    private function testPathao(CourierSetting $setting)
    {
        // Check required credentials
        $credentials = [
            'Client ID' => $setting->client_id,
            'Client Secret' => $setting->client_secret,
            'Username' => $setting->username,
            'Password' => $setting->password,
        ];

        foreach ($credentials as $label => $value) {
            if (blank($value)) {
                throw new \Exception($label . ' is required.');
            }
        }

        // Sandbox API URL
        $baseUrl = rtrim($setting->base_url, '/');

        if (empty($baseUrl)) {
            throw new \Exception('Pathao API Base URL is missing.');
        }

        // Request Access Token
        $response = Http::timeout(30)
            ->acceptJson()
            ->asJson()
            ->post($baseUrl . '/aladdin/api/v1/issue-token', [
                'client_id' => $setting->client_id,
                'client_secret' => $setting->client_secret,
                'username' => $setting->username,
                'password' => $setting->password,
                'grant_type' => 'password',
            ]);

        // Check API Response
        if (!$response->successful()) {

            throw new \Exception(
                'Pathao API Error: HTTP '
                . $response->status()
                . ' - '
                . substr($response->body(), 0, 1000)
            );
        }

        // Check Access Token
        $accessToken = $response->json('access_token');

        if (blank($accessToken)) {
            throw new \Exception(
                'Pathao API did not return an access token.'
            );
        }

        return $response;
    }


    private function testSteadfast($setting)
    {
        return Http::timeout(20)
            ->acceptJson()
            ->withHeaders([
                'Api-Key' => $setting->api_key,
                'Secret-Key' => $setting->secret_key,
            ])
            ->get(
                rtrim($setting->base_url, '/') . '/get_balance'
            );
    }

    private function testRedx($setting)
    {
        return Http::timeout(20)
            ->acceptJson()
            ->withToken($setting->access_token)
            ->get(
                rtrim($setting->base_url, '/') . '/areas'
            );
    }
    public function update(Request $request, string $courier)
    {
        abort_unless(
            in_array($courier, ['pathao', 'steadfast', 'redx']),
            404
        );

        $rules = [
            'base_url' => ['required', 'url', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ];

        if ($courier === 'pathao') {
            $rules += [
                'client_id' => ['nullable', 'string', 'max:2000'],
                'client_secret' => ['nullable', 'string', 'max:2000'],
                'username' => ['nullable', 'string', 'max:2000'],
                'password' => ['nullable', 'string', 'max:2000'],
                'store_id' => ['nullable', 'string', 'max:255'],
            ];
        }

        if ($courier === 'steadfast') {
            $rules += [
                'api_key' => ['nullable', 'string', 'max:2000'],
                'secret_key' => ['nullable', 'string', 'max:2000'],
            ];
        }

        if ($courier === 'redx') {
            $rules += [
                'access_token' => ['nullable', 'string', 'max:4000'],
            ];
        }

        $validated = $request->validate($rules);

        $setting = CourierSetting::where('courier', $courier)
            ->firstOrFail();

        $secretFields = [
            'client_id',
            'client_secret',
            'username',
            'password',
            'store_id',
            'api_key',
            'secret_key',
            'access_token',
        ];

        foreach ($secretFields as $field) {
            if (
                array_key_exists($field, $validated) &&
                $validated[$field] !== null &&
                $validated[$field] !== ''
            ) {
                $setting->{$field} = $validated[$field];
            }
        }

        $setting->base_url = $validated['base_url'];

        $setting->is_active = $request->boolean('is_active');

        // Credentials changed, so previous connection test is stale.
        $setting->connection_status = 'untested';
        $setting->last_tested_at = null;
        $setting->last_error = null;

        $setting->save();

        return back()->with(
            'success',
            $setting->name . ' settings updated successfully.'
        );
    }
}
