<?php

namespace App\Livewire;

use App\Http\Controllers\UtilsController;
use App\Models\Item;
use App\Models\Recorrido;
use App\Models\Subitem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Formulario extends Component
{
    public $atr = 'true';
    public $item_id;
    public $aria_expanded = 'true';
    public $item_selected = [];

    public $total_vista;

    public $observaciones;

    public $hidden_item = '';
    public $hidden_observaciones = '';
    public $hidden_botton = '';

    public function total()
    {
        $valores = [];

        for ($i = 0; $i < count($this->item_selected); $i++) {
            $porcentaje = Subitem::where('id', $this->item_selected[$i])->first()->porcentaje;
            array_push($valores, $porcentaje);
        }

        $this->total_vista = array_sum($valores);
    }

    protected function ocultar()
    {
        $this->hidden_item = 'hidden';
        $this->hidden_observaciones = 'hidden';
        $this->hidden_botton = 'hidden';
    }

    protected function final_inspeccion()
    {
        $count = Recorrido::where('fecha_reporte', date('d-m-Y'))->get()->count();

        if ($count == 10)
        {
            $user = Auth::user()->name;

            /**Log de recorrido */
            UtilsController::log_recorrido($user, $entrada = null, $accion = 'Finalizo el recorrido, formulario cargado en su totalidad');

            redirect(route('images'));
        }
    }

    public function store()
    {
        try {

            $user = Auth::user()->name;

            $item_descripcion = Item::where('id', $this->item_id)->first()->descripcion;

            $recorrido = new Recorrido();
            $recorrido->item_id = $this->item_id;
            $recorrido->descripcion = $item_descripcion;
            $recorrido->operatividad = $this->total_vista;
            $recorrido->fecha_reporte = date('d-m-Y');
            $recorrido->total_personal = '20';
            $recorrido->observaciones = $this->observaciones;
            $recorrido->responsable = $user;
            $recorrido->save();

            sleep(.5);

            $this->ocultar();

            $this->final_inspeccion();

            // session()->flash('message', 'todo bien');


        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        $expanded = $this->aria_expanded;
        $item_id = $this->item_id;
        $total = $this->total_vista;
        $items = Item::find($this->item_id);
        // $items = Item::with('get_subitems')->get();

        // dd($items);


        return view('livewire.formulario', compact('items', 'total', 'item_id', 'expanded'));
    }
}
