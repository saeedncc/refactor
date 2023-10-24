<?php

namespace App\Http\Resources;

class ProjectItemSingleResource extends BaseResource
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
			'item' => null,
			'opertors' => [],
			'admins' => [],
        ];

		
		if($this->item!=null){
			$result['item'] = $this->when($this->item,new ProjectItemResource($this->item));
		}
		
		if($this->admins!=null && count($this->admins)){
			$result['admins'] = $this->when($this->admins,AdminResource::collection($this->admins));
		}
		
		if($this->opertors!=null && count($this->opertors)){
			$result['opertors'] = $this->when($this->opertors,AdminResource::collection($this->opertors));
		}
		
        return $result;

    }
	
}
