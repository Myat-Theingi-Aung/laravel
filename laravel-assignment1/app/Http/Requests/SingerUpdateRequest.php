<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SingerUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'singer_name' => 'required',
            'age' => 'required | integer',
            'type' => 'required',
            'gender' => 'required',
        ];
    }
}