<?php

namespace App\Http\Resources\V1\CenterPublication;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CenterPublicationSourceResource extends JsonResource
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
            'image' => $this->whenNotNull($this->imageUrl, $this->imageUrl),
            'title' => $this->whenNotNull($this->t('title')),
            'writer_name' => $this->whenNotNull($this->writer_name),
            'desc' => $this->whenNotNull($this->t('desc')),
            'view_link' => $this->whenNotNull($this->finalUrl),
            'link_to_paper_copy' => $this->whenNotNull($this->link_to_paper_copy),
        ];
    }
}
