<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'maximum_tickets' => ['required', 'numeric'],
            'item_order' => ['required', 'numeric'],
        ];
    }

    /**
     * Custom Error Message
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Package name is required.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',
            'maximum_tickets.required' => 'Maximum tickets is required.',
            'maximum_tickets.numeric' => 'Maximum tickets must be a number.',
            'item_order.required' => 'Item order is required.',
            'item_order.numeric' => 'Item order must be a number.',
        ];
    }
}
