<?php

namespace App\Http\Requests;

use App\Http\Requests\StoreVideoRequest;
use Illuminate\Validation\Rule;

class UpdateVideoRequest extends StoreVideoRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'slug' => ['required', Rule::unique('videos')->ignore($this->video), 'alpha_dash'],
            'path' => ['nullable', 'file', 'mimetypes:video/mp4,video/mpeg,video/ogg,video/webm,video/mp2t'],
        ]);
    }
}
