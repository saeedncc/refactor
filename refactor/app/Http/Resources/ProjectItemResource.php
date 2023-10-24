<?php

namespace App\Http\Resources;

class ProjectItemResource extends BaseResource
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
            'id' => $this->id,
            'title' => $this->title,
            'duration' => $this->duration,
            'percent' => $this->percent,
            'supervisorid' => $this->supervisorid?$this->supervisorid:null,
            'executiveid' => $this->executiveid?$this->executiveid:null,
            'assessorid' => $this->assessorid?$this->assessorid:null,
            'adminid' => $this->adminid,
            'manager' => $this->manager,
			'supervisor' => $this->supervisor,
			'assessor' => $this->assessor,
			'executive' => $this->executive,
			
        ];
		
		if($this->project!=null){
			$result['project'] = $this->when($this->project,new ProjectResource($this->project));
		}
		
		if($this->flow!=null){
			$result['flow'] = $this->when($this->flow,new ProjectFlowResource($this->flow));
		}
		
		if($this->history!=null && count($this->history)){
			$result['history'] = $this->when($this->history,ProjectFlowResource::collection($this->history));
		}
		
		
        return $result;
    }
	
}
