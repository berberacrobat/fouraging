<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = null;

    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description'=> $this->description,
            'forage' =>  $this->forage->id,
            'forage_name' => $this->forage->name,
            'forage_image' => $this->forage->image,
            'address' => $this->address,
            'documents' => new DocumentCollection($this->documents)
        ];
    }
}
