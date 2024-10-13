<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class StorePlayerRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'points' => 'nullable|numeric|min:0',
            'rebounds' => 'nullable|numeric|min:0',
            'assists' => 'nullable|numeric|min:0',
        ];
    }
}
