<?php

namespace App\Mail;

use App\OrderDetail;
use App\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class SuccessOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $contact_number;
    protected $customer_name;
    protected $total_amount;
    protected $orderDetails;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $contact_number, String $customer_name, String $total_amount, Collection $orderDetails)
    {
        $this->contact_number = $contact_number;
        $this->customer_name = $customer_name;
        $this->total_amount = $total_amount;
        $this->orderDetails = $orderDetails;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.mail.emails-success-order')
            ->subject("Thank you for ordering Pizza Hut")
            ->with([
                'contactNumber' => $this->contact_number,
                'totalAmount' => $this->total_amount,
                'customerName' => $this->customer_name,
                'carts' => $this->orderDetails
            ]);
    }
}
