<?php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    /**
     *
     */
    use Queueable, SerializesModels;

    /**
     * @param Invitation $invitation
     */
    public function __construct(private Invitation $invitation)
    {
    }

    /**
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('Приглашение в проект'),
        );
    }

    /**
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'markdown.mail.invitation', with: [
                'invitation' => $this->invitation, 'route' => route('invitation.show', $this->invitation->token),
            ],
        );
    }
}
