<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class MailTukarJadwal extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Auth::user()->email)
            ->view('user-views.mail.mailtukarjadwal')
            ->with(
            [
                'nama' => Auth::user()->Pegawai->nama_pegawai,
                'website' => 'kepegawaian-pelabuhan.com',
            ]);
    }
}
