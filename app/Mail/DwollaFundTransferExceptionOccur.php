<?php

namespace App\Mail;

use App\Models\DwollaFundTransferException;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DwollaFundTransferExceptionOccur extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var DwollaFundTransferException
     */
    private $dwolla;
    private $errorBody;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dwolla)
    {
        $this->dwolla = $dwolla;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = sprintf("%s.txt", \Str::random());
        return $this->subject('Payment error')->view('mails.admin.fund_transfer_exception', ['data' => $this->dwolla])->attachData($this->dwolla, $name);
    }
}
