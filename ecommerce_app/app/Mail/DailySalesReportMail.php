<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Collection;

class DailySalesReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Collection $sales // Accept the list of sold items
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Daily Sales Report - ' . now()->toFormattedDateString(),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.daily-sales',
        );
    }
}
