<?php

namespace App\Http\Resources\V1\CenterProgram;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CenterProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenNotNull($this->id, $this->id),
            'title' => $this->whenNotNull($this->t('title'), ($this->t('title'))),
        ];
    }
}
