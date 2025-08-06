<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
        $type = $this->input('type');

        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
            'type' => 'required|in:image,video,video_link',
        ];

        if ($type === 'image') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
            $rules['image_redirection_link'] = 'required|url';
        }

        if ($type === 'video') {
            $rules['video'] = 'required|mimes:mp4,mov,ogg,qt|max:51200'; // 50MB limit
            $rules['video_thumbnail'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        }

        if ($type === 'video_link') {
            $rules['video_link'] = 'required|url';
        }

        return $rules;
    }


    public function messages(): array
    {
        return [
            'type.required' => 'Banner type is required.',
            'type.in' => 'Invalid banner type selected.',
        ];
    }
}
