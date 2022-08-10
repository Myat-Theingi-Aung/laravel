<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SongUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'writer_name' => 'required',
            'type' => 'required',
            'singer_id' => 'required',
        ];
    }
}