<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
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
        if(isset($this->data['attach'])){
            return $this->from($this->data['user']->email,'JP'.$this->data['user']->id)
                        ->subject('CONTACT | ' . config('const.site_title') . ' (JP' . $this->data['user']->id . ')')
                        ->text('home.emails.contact')
                        ->with(['data' => $this->data])
                        ->attach(storage_path('app/'.$this->data['attach']));
        }else{
            return $this->from($this->data['user']->email,'JP'.$this->data['user']->id)
                        ->subject('CONTACT | ' . config('const.site_title') . ' (JP' . $this->data['user']->id . ')')
                        ->text('home.emails.contact')
                        ->with(['data' => $this->data]);
        }
    }
}
