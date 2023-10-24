<?php

namespace App\Http\Resources;

class AdminAllResource extends BaseResource
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
        ];

		
		if($this->items!=null && count($this->items)){
			$result['items'] = $this->when($this->items,AdminResource::collection($this->items));
		}
		
        return $result;
		
    }
	
}
