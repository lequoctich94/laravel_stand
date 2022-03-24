<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ModelSendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //from('email from','name') => có thể config ở config/mail.php
        //return $this->view('emails.orders.shipped');
        //view('') chỉ định template email cần gửi
        $dataMessage = $this->data['message'];
        return $this->from('lequoctich94@gmail.com', 'Example')
                ->subject('test email trap')
                ->view('emails.test', compact('dataMessage'));
    }
}
