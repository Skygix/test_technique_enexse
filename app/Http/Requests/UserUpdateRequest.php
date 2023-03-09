<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method == 'PUT'){
            return [
                'username' => 'required',
                'fullname' => 'required',
                'gender' => 'required',
                'email' => 'required|email:rfc,dns',
                'dateOfBirth' => 'required',
                'country' => 'required',
                'phonePrefix' => 'required',
                'phoneNumber' => 'required'
            ];
        } else {
            return [
                'username' => ['sometimes','required'],
                'fullname' =>  ['sometimes','required'],
                'gender' =>  ['sometimes','required'],
                'email' => ['sometimes','required','email:rfc,dns'],
                'dateOfBirth' =>  ['sometimes','required'],
                'country' =>  ['sometimes','required'],
                'phonePrefix' =>  ['sometimes','required'],
                'phoneNumber' =>  ['sometimes','required']
            ];
        }
      
    }

  
    protected function failedValidation($validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
