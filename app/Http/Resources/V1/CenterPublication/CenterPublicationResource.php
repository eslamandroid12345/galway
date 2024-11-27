<?php

namespace App\Http\Resources\V1\CenterPublication;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CenterPublicationResource extends JsonResource
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
            'writer_name' => $this->whenNotNull($this->writer_name),
        ];
    }
}
