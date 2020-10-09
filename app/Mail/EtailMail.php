<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mail;

class EtailMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parameters = array())
    { 
        foreach ($parameters as $key => $value){
            $this->$key = $value;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.email')->with([
            'greeting' => $this->greeting,
            'body' => $this->body,
            'footer' => $this->footer,
            'CTA' => $this->CTA,
            'URL' => $this->URL
        ]);
    }

    public static function welcomeUser($values)
    {
        $array = array(
            'greeting' => 'Hi '.$values->name,
            'subject' => 'Thank You For Registering'.' | '.\Config::get('app.name'),
            'body' => 'You have successfully created your account.',
            'footer' => 'Keep Shopping',
            'CTA' => 'Visit Shop',
            'URL' => \Config::get('app.url').'/shop',
        );
        Mail::to($values->email)->send(new self($array));
    }
}
