<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reserva;

class FinalizarReservas extends Command
{
    protected $signature = 'reservas:finalizar';
    protected $description = 'Finaliza automáticamente las reservas cuya fecha_fin ya pasó';

    public function handle()
    {
        $res = Reserva::whereIn('estado', ['pendiente', 'confirmada'])
            ->where('fecha_fin', '<', now())
            ->get();

        foreach ($res as $r) {
            $r->estado = 'finalizada';
            $r->save();
        }

        $this->info('Reservas finalizadas correctamente.');
    }
}
