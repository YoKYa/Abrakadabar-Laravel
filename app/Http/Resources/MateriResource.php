<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class MateriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $nilai = $this->nilai->sortByDesc('nilai')->first();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'link_image' => $this->link_image,
            'kesulitan' => $this->kesulitan,
            'sinopsis' => $this->sinopsis,
            'publish' => $this->publish,
            'nilai' => [$nilai],
            ];
    }
}

