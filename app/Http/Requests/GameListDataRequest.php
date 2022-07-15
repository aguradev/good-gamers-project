<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameListDataRequest extends FormRequest
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
            "title_game" => "required|Unique:gamelist_table",
            "price" => "numeric",
            "story_game" => "required",
            "photo_cover" => "required|file|image|max:2048|mimes:jpeg,jpg",
            "banner_photo" => "required|file|image|max:2048|mimes:jpeg,jpg"
        ];
    }
}
