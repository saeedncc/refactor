<?php

namespace App\Http\Resources;

class ProjectResource extends BaseResource
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
            'title' => $this->title,
			'manager' => $this->when($this->manager, $this->manager),
			'duration' => $this->when($this->duration, $this->duration),
			'numitem' => $this->when($this->numitem, $this->numitem),
        ];
    }
	
}
