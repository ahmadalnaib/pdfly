<?php

namespace App\Mail;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Sale $sale, $pdfPath)
    {
        $this->pdfPath = $pdfPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:"نشكركم على دعمكم وثقتكم بخدماتنا في مجال الذكاء الاصطناعي. نحن هنا لنقدم لكم الأفضل دائماً ونتطلع إلى تحقيق أقصى استفادة ممكنة لكم من خلال رصيدكم الجديد."
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.purchase-confirmation',
            with: [
                'sale' => $this->sale,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)
            ->as('Buchung.pdf')
            ->withMime('application/pdf'),
        ];
    }
}
