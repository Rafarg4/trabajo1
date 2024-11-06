<?php

namespace App\Mail;

use App\Models\Paciente;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PacienteCreadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $paciente;

    /**
     * Create a new message instance.
     *
     * @param Paciente $paciente
     */
    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.paciente_creado')
                    ->subject('Nuevo Paciente Creado')
                    ->with([
                        'nombre' => $this->paciente->nombre,
                        'apellido' => $this->paciente->apellido,
                        'documento' => $this->paciente->documento,
                    ]);
    }
}
