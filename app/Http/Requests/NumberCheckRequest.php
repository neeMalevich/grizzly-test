<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumberCheckRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'phone' => str(request('phone'))
                ->squish()
                ->value()
        ]);
    }

    public function messages()
    {
        return [
            'phone.required' => 'это поле обязательно',
            'phone.regex' => 'это поле должно быть числом',
            'phone.min' => 'это поле минимально 10 символов',
        ];
    }
}
