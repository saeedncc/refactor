<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{

	
	public function with($request)
    {
        return [
            "state" => 1,
        ];
    }
	
	public static $wrap = 'result';
	
}
