<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $subject='Nuevo boletín';
    public $sms;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sms)
    {
        $this->sms=$sms;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sender@example.com')
                    ->view('admin.correos.message-received')
                    // ->text('mails.demo_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            // 'testVarTwo' => '2',
                      ]);
        // return $this->view('admin.correos.message-received');
    }
}
