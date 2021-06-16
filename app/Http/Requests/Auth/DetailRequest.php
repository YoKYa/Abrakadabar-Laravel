<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
            'call_name' => 'required|max:25',
            'tempat_lahir' => 'required',
            'tanggal_lahir' =>'required',
            'jenis_kelamin' => 'required',
            'detail' => 'required',
        ];
    }
}
