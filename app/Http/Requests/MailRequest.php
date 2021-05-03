<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class MailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->type_id > 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mailsubject' => 'required',
            'selection' => 'required',
            'mailcontent' => 'required'
        ];
    }

    public function message()
    {
        return [
            'mailsubject.required' => ' Subject is Required',
            'selection.required' => 'Select user please',
            'mailcontent.required' => 'Content is Required'
        ];
    }
}
