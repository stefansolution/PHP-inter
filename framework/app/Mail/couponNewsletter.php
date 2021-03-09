<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class couponNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $storeCoupon ='';
    
    public function __construct($storeCoupon)
    {
        
        $this->storeCoupon=$storeCoupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('newsletter')->from('coupons@dealrated.com')->subject("We've found a new deal for ".$this->storeCoupon['storeName']);
    }
}
