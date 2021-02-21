<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovaSerieCadastrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $nomeSerie = $event->nomeSerie;
        $qtdTemporadas = $event->qtdTemporadas;
        $qtdEpisodios = $event->qtdEpisodios;

        $todosUsuarios = User::all();

        foreach ($todosUsuarios as $indice => $usuario) {
            $multiplicador = $indice + 1;

            $email = new \App\Mail\NovaSerie(
                $nomeSerie,
                $qtdTemporadas,
                $qtdEpisodios
            );
    
            $email->subject = "Nova Série Adicionada";

            $delay = now()->addSecond($multiplicador * 5);

            Mail::to($usuario)->later($delay, $email);
        }
    }
}
