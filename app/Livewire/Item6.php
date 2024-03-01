<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Recorrido;
use App\Models\Subitem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Item6 extends Component
{
    public $item_selected = [];

    public $total_vista;

    public $observaciones;

    public $hidden_item = '';
    public $hidden_observaciones = '';
    public $hidden_botton = '';

    public function total()
    {
        $valores = [];

        for ($i=0; $i < count($this->item_selected) ; $i++) {
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

    public function store()
    {
        try {
                $user = Auth::user()->name;

                $item_descripcion = Item::where('id', 6)->first()->descripcion;

                $recorrido = new Recorrido();
                $recorrido->item_id = 6;
                $recorrido->descripcion = $item_descripcion;
                $recorrido->operatividad = $this->total_vista;
                $recorrido->fecha_reporte = date('d-m-Y');
                $recorrido->total_personal = '20';
                $recorrido->observaciones = $this->observaciones;
                $recorrido->responsable = $user;
                $recorrido->save();

                sleep(1);

                $this->ocultar();

        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function render()
    {
        $total = $this->total_vista;
        $items = Item::find(6);
        // dd($items);
        return view('livewire.item6', compact('items','total'));
    }
}

