<?php
namespace App\Services\Courier;

use Illuminate\Support\Facades\DB;

class FraudCheckerService
{
    /**
     * Normalize Bangladesh phone number.
     */
    public function normalizePhone(string $phone): string
    {
        $phone = preg_replace('/\D+/', '', $phone);

        if (str_starts_with($phone, '880')) {
            $phone = substr($phone, 3);
        }

        return $phone;
    }

    /**
     * Generate phone number variations.
     */
    protected function phoneVariants(string $phone): array
    {
        $local = $this->normalizePhone($phone);

        return array_unique([
            $local,
            '88' . $local,
            '+88' . $local,
        ]);
    }

    /**
     * Check customer order history.
     */
    public function check(string $phone): array
    {
        $variants = $this->phoneVariants($phone);

        /*
         * Search using both:
         * orders.shipping_phone
         * users.phone
         */
        $orders = DB::table('orders')
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'orders.status_id')
            ->where(function ($query) use ($variants) {
                $query->whereIn('orders.shipping_phone', $variants)
                    ->orWhereIn('users.phone', $variants);
            })
            ->select([
                'orders.id',
                'orders.order_number',
                'orders.status_id',
                'orders.created_at',
                'orders.shipping_phone',
                'users.name as customer_name',
                'users.phone as user_phone',
                'statuses.name as status_name',
            ])
            ->orderByDesc('orders.id')
            ->get();

        $deliveredStatuses = [
            'completed',
            'complete',
            'delivered',
            'success',
            'successful',
        ];

        $badStatuses = [
            'cancelled',
            'canceled',
            'returned',
            'return',
            'failed',
            'delivery_failed',
            'refunded',
        ];

        $delivered = $orders->filter(function ($order) use ($deliveredStatuses) {
            return in_array(
                strtolower(trim($order->status_name ?? '')),
                $deliveredStatuses
            );
        })->count();

        $cancelled = $orders->filter(function ($order) use ($badStatuses) {
            return in_array(
                strtolower(trim($order->status_name ?? '')),
                $badStatuses
            );
        })->count();

        $total = $orders->count();

        // Only evaluated orders are used in the success rate.
        $evaluated = $delivered + $cancelled;

        $successRate = $evaluated > 0
            ? round(($delivered / $evaluated) * 100, 2)
            : 0;

        $cancelRate = $evaluated > 0
            ? round(($cancelled / $evaluated) * 100, 2)
            : 0;

        /*
         * Risk assessment.
         */
        if ($total === 0) {

            $risk = 'new';
            $riskLabel = 'New Customer';
            $riskColor = 'secondary';

        } elseif ($evaluated < 2) {
            $risk = 'insufficient';
            $riskLabel = 'Insufficient History';
            $riskColor = 'secondary';
        } elseif
        ($cancelRate >= 60) {

            $risk = 'high';
            $riskLabel = 'High Risk';
            $riskColor = 'danger';

        } elseif ($cancelRate >= 35) {

            $risk = 'medium';
            $riskLabel = 'Medium Risk';
            $riskColor = 'warning';

        } elseif ($successRate >= 80) {

            $risk = 'low';
            $riskLabel = 'Low Risk';
            $riskColor = 'success';

        } else {

            $risk = 'medium';
            $riskLabel = 'Medium Risk';
            $riskColor = 'warning';
        }

        return [
            'phone' => $this->normalizePhone($phone),

            'total_orders' => $total,
            'delivered' => $delivered,
            'cancelled' => $cancelled,

            'success_rate' => $successRate,
            'cancel_rate' => $cancelRate,

            'risk' => $risk,
            'risk_label' => $riskLabel,
            'risk_color' => $riskColor,

            'orders' => $orders,
        ];
    }
}
