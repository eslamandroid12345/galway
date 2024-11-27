<?php

namespace App\Http\Resources\V1\Lecture;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_title' => $this->whenNotNull($this->t('first_title')),
            'second_title' => $this->whenNotNull($this->t('second_title')),
            'writer_name' => $this->whenNotNull($this->writer_name),
            'job_title' => $this->whenNotNull($this->t('job_title')),
            'desc' => $this->whenNotNull($this->t('desc')),
            'url' => $this->whenNotNull($this->finalUrl),
            'papers' => LectureResource::collection($this->whenLoaded('children')),
        ];
    }
}
