<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.03.19
 *
 */

namespace App\Modules\Files\Http\Requests\Admin;

use App\Modules\Files\Enums\FileSignTypeEnum;
use App\Modules\Files\Rules\FileMaxSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadFileRequest extends FormRequest
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
            'sign' => ['required', 'string', 'max:100', Rule::in(FileSignTypeEnum::getAll())],
            'file' => 'required|file|max:' . FileMaxSize::getMaxSize($this),
            'path' => 'nullable|string|max:20',
        ];
    }
}