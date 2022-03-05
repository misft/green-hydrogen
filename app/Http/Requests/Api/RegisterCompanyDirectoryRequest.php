<?php

namespace App\Http\Requests\Api;

use App\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterCompanyDirectoryRequest extends FormRequest
{
    use Response;

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->badRequest(400, "Request Invalid", $validator->getMessageBag()->toArray()));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_directory_topic_id' => 'required',
            'region_id' => 'required',
            'email' => 'required|string|email:rfc,dns',
            'password' => 'required|string|min:8|max:16',
            'name' => 'required|string',
            'description' => 'nullable|string|max:120',
            'photo' => 'nullable|image|max:2048',
            'website' => 'nullable|string|max:100',
            'address' => 'required|string|max:100',
            'contact' => 'required|string|max:90',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric'
        ];
    }
}
