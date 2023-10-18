<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'team_name' => 'required',
            'team_title' => 'required',
            'team_image' => 'required',
            'team_facebook' => 'required',
            'team_twitter' => 'required',
            'team_linkedin' => 'required',
            'team_instagram' => 'required',
        ];
    }
}
