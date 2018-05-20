<?php

namespace App\Mail;

use App\Beneficiary;
use App\MailSetting;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Beneficiarys extends Mailable
{
    use Queueable, SerializesModels;
    public $beneficiary;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Beneficiary $beneficiary)
    {
        $this->beneficiary =$beneficiary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['setting'] = MailSetting::find(1);
        $data['member'] = $this->beneficiary;
        return $this->view('emails.schedule')->with($data)
            ->replyTo($data['setting']['reply_to'])
            ->subject("Immunization Schedule For ".$data['member']->child_name);
    }
}
