<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UndoRegisterPostRequest extends FormRequest

{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
        ['menu' => ['required', 'max:40'],
        'minutes' => ['numeric','required', 'max:3'],
        'level' => ['required', 'numeric', Rule::in([1, 2, 3]) ],
        'target' => ['max:300'],
        'detail' => ['max:800'],
        ];
    }
}
