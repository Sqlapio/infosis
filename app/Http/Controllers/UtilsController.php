<?php

namespace App\Http\Controllers;

use App\Models\LogRecorrido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UtilsController extends Controller
{
    static function log_recorrido($usuario, $entrada, $accion)
    {
        try {

            $log = new LogRecorrido();
            $log->usuario = $usuario;
            $log->entrada = $entrada;
            $log->accion = $accion;
            $log->save();

        } catch (\Throwable $th) {
            dd($th);
        }
    }

}
