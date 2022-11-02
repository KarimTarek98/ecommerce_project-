<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }


    public function build()
    {
        $order = $this->data;
        return $this->from('support@starbuy.net')->view('app.mail.order-mail', compact('order'))
            ->subject('From Starbuy Ecommerce Store');
    }
}
