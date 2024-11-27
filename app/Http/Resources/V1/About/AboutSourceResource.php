<?php

namespace App\Http\Resources\V1\About;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutSourceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->whenNotNull($this->t('title')),
            'second_title' => $this->whenNotNull($this->t('second_title')),
            'desc' => $this->whenNotNull($this->t('desc')),
            'image' => $this->whenNotNull($this->imageUrl),
        ];
    }
}
