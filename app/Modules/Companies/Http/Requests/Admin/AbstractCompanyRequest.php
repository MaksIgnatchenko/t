<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Content\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractCompanyRequest extends FormRequest
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
        $commonRules = [
            'logo' => 'nullable|string|max:100',
            'info' => 'required|string|max:1000',
        ];
        return array_merge(
            $commonRules,
            $this->getNameRule()
        );
    }

    /**
     * @return array
     */
    abstract public function getNameRule(): array;
}
