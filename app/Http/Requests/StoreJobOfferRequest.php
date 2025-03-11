<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobOfferRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ajuste conforme sua lógica de autorização
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary_min' => 'required|numeric|min:0',
            'salary_max' => 'required|numeric|gte:salary_min',
            'keywords' => 'nullable|string',
            'expires_at' => 'required|date|after:now',
            'location' => 'nullable|string',
            'contract_type' => 'nullable|in:internship,full-time,part-time',
        ];
    }
}
