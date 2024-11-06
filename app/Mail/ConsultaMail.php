<?php

namespace App\Mail;
use App\Models\Consulta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $consulta;
    /**
     * Create a new message instance.
     *
     * @return void
     */
   Public function __construct(Consulta $consulta)
    {
        $this->consulta = $consulta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.consultas')
                    ->subject('Nueva Consulta del cliente:')
                    ->with([
                        'receta' => $this->consulta->receta,
                        'estado' => $this->consulta->estado,
                        'fecha' => $this->consulta->fecha,
                    ]);
    }
}
