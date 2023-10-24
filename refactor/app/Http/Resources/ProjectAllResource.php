<?php

namespace App\Http\Resources;

class ProjectAllResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		
		$result=[
			'total' => $this->total,
			'items' => [],
			'admins' => [],
        ];

		
		if($this->items!=null && count($this->items)){
			$result['items'] = $this->when($this->items,ProjectResource::collection($this->items));
		}
		
		if($this->admins!=null && count($this->admins)){
			$result['admins'] = $this->when($this->admins,AdminResource::collection($this->admins));
		}
		
        return $result;
		
    }
	
}
