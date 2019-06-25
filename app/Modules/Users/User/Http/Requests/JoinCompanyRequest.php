<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.06.19
 *
 */

namespace App\Modules\Users\User\Http\Requests;

use App\Services\ResponseBuilder\ValidationErrorsApiMessagesTrait;
use Illuminate\Foundation\Http\FormRequest;

class JoinCompanyRequest extends FormRequest
{
    use ValidationErrorsApiMessagesTrait;

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'company_join_code' => 'nullable|string|size:' . config('custom.company_join_code_length') . '|exists:companies,join_code',
        ];
    }
}