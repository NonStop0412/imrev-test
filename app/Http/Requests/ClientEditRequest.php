<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientEditRequest extends FormRequest
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
            'name' => 'string|required|max:50',
            'surname' => 'string|required|max:50',
            'email' => 'email|required|unique:App\Models\Client,email,' . $this->id,
        ];
    }
}
