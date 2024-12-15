<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
        return [
            //
            'first_name_fr' => 'required|string|max:255',
            'last_name_fr' => 'required|string|max:255',
            'first_name_ar' => 'required|string|max:255',
            'last_name_ar' => 'required|string|max:255',
            'sex' => 'required|in:male,female,other',
            'cin' => 'required|string|max:20|unique:users,cin',
            'nationality' => 'required|string|max:255',
            'situation' => 'required|in:Single,Married,Divorced',
            'city' => 'required|string|max:255',
            'city_ar' => 'required|string|max:255',
            'adress_fr' => 'required|string|max:255',
            'adress_ar' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits_between:8,15|unique:users,phone_number',
            'birthday' => 'required|date|before:today',
        ];
    }
    public function messages(){
        return [
            'first_name_fr.required' => 'First name is required.',
            'last_name_fr.required' => 'Last name is required.',
            'cin.unique' => 'The national identity card number already exists.',
            'phone_number.unique' => 'The phone number is already in use.',
            'birthday.before' => 'The birthdate must be before today.',
            'sex.in' => 'The selected sex is invalid.',
            'situation.in' => 'The selected family situation is invalid.',

        ];
    }
}
