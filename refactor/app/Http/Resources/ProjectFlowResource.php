<?php

namespace App\Http\Resources;

class ProjectFlowResource extends BaseResource
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
            'origin' => trans('main.units.'.$this->origin),
            'dest' => trans('main.units.'.$this->dest),
            'path' => $this->path!='' ? asset('storage/'.$this->path) : '',
            'note' => $this->note,
            'action' => $this->action,
            'adminid' => $this->adminid,
            'created_at' => jdate("H:i__Y/m/d",$this->created_at),

        ];
    }
	
}
