<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderConfirmRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:7|max:40',
            'email' => 'required|email',
            'address' => 'required|min:10|max:255',
            'city' => 'required|min:2',
            'phone' => 'required|regex:/0[0-9]{9}/',
        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для ввода',
            'min' => 'Поле :attribute должно содержать минимум :min символа',
            'regex' => 'Телефон должен быть записан в формате: 0981231212',
        ];
    }
}
