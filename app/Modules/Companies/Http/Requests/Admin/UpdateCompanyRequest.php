<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.06.19
 *
 */

namespace App\Modules\Content\Http\Requests\Admin;

class UpdateCompanyRequest extends AbstractCompanyRequest
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
     * @return array
     */
    public function getNameRule(): array
    {
        return [
            'name' => "required|string|max:50|unique:companies,name,{$this->company->id}",
        ];
    }


}
