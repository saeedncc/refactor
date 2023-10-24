<?php

namespace App\Http\Resources;

class AdminResource extends BaseResource
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
            'id' => $this->id,
            'name' => $this->name,
            'lname' => $this->lname,
            'mobile' => $this->when($this->mobile, $this->mobile),
            'email' => $this->when($this->email, $this->email),
            'kind' => $this->when($this->kind, $this->kind),
        ];
    }
	
}
