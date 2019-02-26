<?php

namespace App\Modules\Content\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'logo' => 'file|image|mimes:jpeg,png,jpg|max:' . config('custom.company_logo_max_size'),
            'info' => 'required|string|max:1000',
        ];
    }
}
