<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'team_id' => 'nullable|exists:teams,id',
            'points' => 'nullable|integer|min:0',
            'rebounds' => 'nullable|integer|min:0',
            'assists' => 'nullable|integer|min:0',
        ];
    }
}
