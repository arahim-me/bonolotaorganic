<?php

namespace App\Services\Fraud;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class FraudCheckerService
{
    public function check(string $phone): array
    {
        $phone = $this->normalizePhone($phone);

        $orders = Order::query()
            ->where('shipping_phone', $phone)
            ->get();

        $total = $orders->count();

        $delivered = $orders->filter(
            fn($order) => $this->isStatus($order, 'delivered')
        )->count();

        $cancelled = $orders->filter(
            fn($order) => $this->isStatus($order, 'cancelled')
        )->count();

        $returned = $orders->filter(
            fn($order) => $this->isStatus($order, 'returned')
        )->count();

        $pending = $orders->filter(
            fn($order) => $this->isStatus($order, 'pending')
        )->count();

        $successRate = $total > 0
            ? round(($delivered / $total) * 100, 2)
            : 0;

        $cancelRate = $total > 0
            ? round(($cancelled / $total) * 100, 2)
            : 0;

        $returnRate = $total > 0
            ? round(($returned / $total) * 100, 2)
            : 0;

        $riskScore = $total > 0
            ? round((($cancelled + $returned) / $total) * 100, 2)
            : 0;

        $riskLevel = match (true) {
            $total === 0 => 'unknown',
            $riskScore >= 70 => 'high',
            $riskScore >= 40 => 'medium',
            default => 'low',
        };

        return [
            'phone' => $phone,

            'total_orders' => $total,
            'delivered_orders' => $delivered,
            'cancelled_orders' => $cancelled,
            'returned_orders' => $returned,
            'pending_orders' => $pending,

            'success_rate' => $successRate,
            'cancel_rate' => $cancelRate,
            'return_rate' => $returnRate,

            'risk_score' => $riskScore,
            'risk_level' => $riskLevel,

            'is_new_customer' => $total === 0,

            'orders' => $orders,
        ];
    }

    protected function isStatus($order, string $status): bool
    {
        $statusName = strtolower(
            $order->status->name
            ?? $order->status->slug
            ?? ''
        );

        $aliases = [
            'delivered' => ['delivered', 'completed'],
            'cancelled' => ['cancelled', 'canceled'],
            'returned' => ['returned', 'return'],
            'pending' => ['pending', 'processing'],
        ];

        return in_array(
            $statusName,
            $aliases[$status] ?? [$status],
            true
        );
    }

    protected function normalizePhone(string $phone): string
    {
        $phone = preg_replace('/\D/', '', $phone);

        if (str_starts_with($phone, '88')) {
            $phone = substr($phone, 2);
        }

        return $phone;
    }
}
