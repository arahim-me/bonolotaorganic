<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'status_id' => ['required', 'integer', 'exists:statuses,id'],
            'payment_method' => ['required', 'integer', 'exists:payment_methods,id'],
            'payment_status' => ['required', 'boolean'],
            'shipping_address' => ['required', 'string', 'max:255'],
            'shipping_phone' => ['required', 'string', 'max:255'],
            'items' => ['required', 'array', 'min:1'],
            'items.*' => ['required', 'array:product_id,quantity'],
            'items.*.product_id' => ['required', 'integer', 'distinct', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }
}
