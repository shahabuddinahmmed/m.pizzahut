<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedBackSMSMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $customer_name;
    protected $order_id;
    protected $is_due;
    protected $is_hot;
    protected $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer_name,$order_id,$is_due,$is_hot,$comment)
    {
        $this->customer_name = $customer_name;
        $this->order_id    = $order_id;
        $this->is_due      = $is_due;
        $this->is_hot      = $is_hot;
        $this->comment     = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = array(
            'customer_name' => $this->customer_name,
            'order_id'      => $this->order_id,
            'is_due'        => $this->is_due,
            'is_hot'        => $this->is_hot,
            'comment'       => $this->comment
        );
        return $this->view('front.mail.feedback_mail',compact('data'));
    }
}
