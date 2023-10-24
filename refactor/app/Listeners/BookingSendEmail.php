<?php
 
namespace DTApi\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

use DTApi\Events\BookingEmail;

use App\Mail\BookingMail;
 
class BookingSendEmail
{
    public function handle(BookingEmail $event)
    {
        
		Mail::to($event->request->user())->send(new BookingMail($event->request->data));
    }
}