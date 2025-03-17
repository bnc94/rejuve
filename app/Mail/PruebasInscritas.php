<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class PruebasInscritas extends Mailable
{
    use Queueable, SerializesModels;

    public $inscripcion;
    public $nombre_competencia;
    public $nombre_usuario;

    /**
     * Create a new message instance.
     */
    public function __construct($inscripcion, $nombre_competencia, $nombre_usuario) 
    {
        $this->inscripcion = $inscripcion;
        $this->nombre_competencia = $nombre_competencia;
        $this->nombre_usuario = $nombre_usuario;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('contacto@rejuve.com', 'REJUVE'),
            replyTo: [
                new Address('contacto@rejuve.com', 'REJUVE'),
            ],
            subject: 'Pruebas Inscritas',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.pruebas-inscritas',
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
            Attachment::fromPath(public_path('/descargables/temario.pdf'))
            ];
    }
}
