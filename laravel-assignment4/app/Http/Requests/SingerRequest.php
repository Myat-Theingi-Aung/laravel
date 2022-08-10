<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SingerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'singer_name' => 'required',
            'age' => 'required',
            'type' => 'required',
            'gender' => 'required',
        ];
    }
}