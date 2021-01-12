<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $subject='Mensaje recibido';
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
                      ])
                      ->attach(public_path('/news_imgs').'/1610257967_foto.png', [
                              'as' => '1610257967_foto.png',
                              'mime' => 'image/png',
                      ]);
        // return $this->view('admin.correos.message-received');
    }
}
