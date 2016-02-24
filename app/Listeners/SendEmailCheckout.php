<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        
        $user  = $event->getUser();
        $order = $event->getOrder();
        
         Mail::send('emails.send-email' , ['user' => $user, 'order' => $order] , function($message) use ($user, $order) {
            $message->to('contatogdantas@yahoo.com.br' , 'Compra realizada no CodeCommerce');
            $message->subject('Pedido: #'.$order->id); 
         }); 
    }
}
