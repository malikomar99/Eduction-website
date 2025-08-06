<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'description'   => $this->description,
            'image_url'     => $this->image,
            'price'         => $this->price,
            'validity_days' => $this->validity_days,
            'status'        => $this->status,
            'category'      => [
                'id'   => $this->category->id,
                'name' => $this->category->name,
                'image_url' => $this->category->image,
            ],
            'files'         => $this->files->map(function ($file) {
                return [
                    'id' => $file->id,
                    'file_name' => $file->file_name,
                    'open_for_all_users' => $file->open_for_all_users,
                    'file_type' => $file->file_type,
                    'files_path' => base64_encode($file->file_path),
                ];
            }),
            'videos'     => $this->videos->map(function ($video) {
                return [
                    'id' => $video->id,
                    'video_label' => $video->video_label,
                    'type' => $video->type,
                    'open_for_all_users' => $video->open_for_all_users,
                    'video_url' => $video->type == 'youtube' ? $video->video_url : base64_encode($video->video_url),
                    'video_thumbnail' => $video->video_thumbnail,
                    'status' => $video->status,
                ];
            }),
            'tests' => $this->tests->map(function ($test) {
                return [
                    'id'         => $test->id,
                    'name'       => $test->name,
                    'questions'  => $test->questions->map(function ($question) {
                        return [
                            'id'             => $question->id,
                            'question_title' => $question->question_title,
                            'answer_reason'  => $question->answer_reason,
                            'image'          => $question->image,
                            'options'        => $question->options->map(function ($option) {
                                return [
                                    'id'         => $option->id,
                                    'option'     => $option->option,
                                    'is_correct' => $option->is_correct,
                                ];
                            }),
                        ];
                    }),
                ];
            }),
        ];
    }
}
