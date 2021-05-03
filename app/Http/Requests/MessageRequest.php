<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
                'name' => 'required',
                'email' => 'required',
                'subject'=>'required',
                'message' => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required' => ' Name is Required',
            'email.required' => 'Email user please',
            'subject.required' => 'subject please',
            'message.required' => 'Message is Required'
        ];
    }
}
