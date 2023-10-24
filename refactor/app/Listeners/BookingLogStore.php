<?php
 
namespace DTApi\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

use DTApi\Events\BookingLoger;
 
class BookingLogStore
{
    public function handle(BookingLoger $event)
    {
        
		Log::channel('single_login')->info('msg',['ip'=>$event->request->ip(),'username' => $event->request->username]);
    }
}