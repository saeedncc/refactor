<?php

namespace DTApi\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class BookingEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
	
	
	public $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request=$request;
    }

}
