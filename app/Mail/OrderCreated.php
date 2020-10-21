<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $cart;

    /**
     * OrderCreated constructor.
     * @param $name
     * @param $cart
     */
    public function __construct($name, $cart)
    {
        $this->name = $name;
        $this->cart = $cart;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullSum = $this->cart->getOrder()->getFullPrice();
        $orderId = $this->cart->getOrder()->id;
        return $this->view('mail.order-created', ['name' => $this->name, 'fullSum' => $fullSum, 'orderId' => $orderId]);
    }
}
