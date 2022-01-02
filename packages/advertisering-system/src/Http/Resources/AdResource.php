<?php

namespace MostafaKamel\AdvertiseringSystem\Http\Resources;

use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"          => $this->id,
            "name"        => $this->name,
            "description" => $this->description,
            // "advertiser"  => optional($this->advertiser) ? [
            //     "name"  => $this->advertiser->name,
            //     "email" => $this->advertiser->email,
            //     "phone" => $this->advertiser->phone,
            // ] : new Collection(),
            // "category"    => optional($this->category) ? new FilterResource($this->category) : new Collection(),
            "tags"        => optional($this->tags) ? FilterResource::collection($this->tags) : new Collection(),
            // "start_date"  => $this->start_date,
        ];
    }
}
