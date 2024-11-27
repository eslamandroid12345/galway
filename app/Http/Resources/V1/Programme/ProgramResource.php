<?php

namespace App\Http\Resources\V1\Programme;

use App\Http\Resources\V1\Lecture\LectureResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->whenNotNull($this->t('title')),
            'desc' => $this->whenNotNull($this->t('desc')),
            'view_link' => $this->whenNotNull($this->finalUrl),
            'link_to_paper_copy' => $this->whenNotNull($this->link_to_paper_copy),
            'video_url' => $this->whenNotNull($this->url),
            'lectures' => LectureResource::collection($this->whenLoaded('children')),
        ];
    }
}
