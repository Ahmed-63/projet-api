<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'title' => 'Titre de mon livre : '. $this->title,
            'content' => substr($this->content, 0, 20) . '...'
    ];
    }
}
