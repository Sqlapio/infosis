<?php

namespace App\Livewire;

use App\Models\Image as ModelsImage;
use Illuminate\Http\Request;
use Livewire\Component;

class Image extends Component
{
    public $file = [];

    public function uploadImages(Request $request)
    {
        $i = $request->filepond->store('/recorrido', 'public');

        $image = new ModelsImage();
        $image->fecha = date('d-m-Y');
        $image->image = $i;
        $image->save();
    }

    public function render()
    {
        return view('livewire.image');
    }
}
