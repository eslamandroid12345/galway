<?php

namespace App\Http\Resources\V1\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->whenNotNull($this->t('name'), ($this->t('name'))),
            'membership' => $this->whenNotNull($this->membership, ($this->membership)),
            'job_title' => $this->whenNotNull($this->t('job_title'), ($this->t('job_title'))),
            'desc' => $this->whenNotNull($this->strL('desc', true, 200), $this->strL('desc', true, 200)),
            'image' => $this->whenNotNull($this->imageUrl, $this->imageUrl),
        ];
    }
}
