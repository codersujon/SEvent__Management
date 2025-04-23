<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSponsorRequest extends FormRequest
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
        $sponsor_id = $this->route('id');
        
        $rules = [
            'name' => ['required'],
            'slug' => ['required', 'alpha_dash'],
            'tagline' => ['required'],
            'description' => ['required'],
        ];

        // For Store Method: Logo and featured photo is required
        if($this->isMethod('post') && $this->routeIs('admin_sponsor_update')){

            // UPDATE: slug should be unique excluding this sponsor's id
            $rules['slug'][] = 'unique:sponsors,slug,' . $sponsor_id;

            // Logo and Featured photos are optional on update
            $rules['logo'] = ['nullable', 'image', 'mimes:jpeg,png,gif,jpg', 'max:2048'];
            $rules['featured_photo'] = ['nullable', 'image', 'mimes:jpeg,png,gif,jpg', 'max:2048'];

        }else{

            // STORE: all fields required
            $rules['logo'] = ['required', 'image', 'mimes:jpeg,png,gif,jpg', 'max:2048'];
            $rules['featured_photo'] = ['required', 'image', 'mimes:jpeg,png,gif,jpg', 'max:2048'];
            $rules['slug'][] = 'unique:sponsors,slug'; // unique on create
        }

        return $rules;

    }

    /**
     * Custom Error Message
     */
    public function messages():array{
        return [
                'name.required' => 'Sponsor name is required.',
        ];
    }
}
