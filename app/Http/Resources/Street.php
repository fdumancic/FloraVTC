<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Street extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->sifra,
            'label' => $this->naziv,
        ];
    }
}
