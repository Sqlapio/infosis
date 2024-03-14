<?php

namespace App\Livewire;

use App\Http\Controllers\UtilsController;
use App\Models\Image as ModelsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;
use Livewire\Component;

class Image extends Component
{
    use Actions;

    public $file = [];

    public $hidden_upload = '';

    public function hiddenUpload()
    {
        try {
            //code...
            $total_images = ModelsImage::where('fecha', date('d-m-Y'))->count();

            if($total_images == 6)
            {
                $this->hidden_upload = 'hidden';
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function uploadImages(Request $request)
    {
        try {

            $user = Auth::user()->name;
            
            $i = $request->filepond->store(date('d-m-Y').'/recorrido', 'public');
            $image = new ModelsImage();
            $image->fecha = date('d-m-Y');
            $image->image = $i;
            $image->responsable = $user;
            $image->save();

            /**Log de recorrido */
            UtilsController::log_recorrido($user, $entrada = null, $accion = 'intento cargar mas imagenes de lo debido');

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        $this->hiddenUpload();
        $images = ModelsImage::where('fecha', date('d-m-Y'))->get();
        return view('livewire.image', compact('images'));
    }
}
