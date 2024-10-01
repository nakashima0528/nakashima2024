<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SystemMail extends Mailable
{
    use Queueable, SerializesModels;

    public $type;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type,$data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = '';
        $subject = config('const.site_title');

        switch($this->type) {
            case config('const.mail.type.CHANGE'):
                $view = 'home.emails.changedAddress';
                $subject = 'Shipping address changed #' . $this->data['parcel']['id'];
                break;
            case config('const.mail.type.PAID'):
                $view = 'home.emails.paidInvoice';
                $subject = 'Invoice paid #' . $this->data['invoice']['id'];
                break;
            case config('const.mail.type.OTHER'):
                break;
        }

        return $this->text($view)
                    ->subject($subject);
    }
}
