<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBoatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'boat_code' => 'required|string|max:255',
            'boat_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'boat_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'license_document' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
