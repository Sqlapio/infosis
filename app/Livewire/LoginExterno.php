<?php

namespace App\Livewire;

use App\Http\Controllers\UtilsController;
use App\Models\User;
use App\Models\Geolocalizacion;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use WireUi\Traits\Actions;
use Livewire\Component;

class LoginExterno extends Component
{
    use Actions;

    #[Validate('required|numeric|digits_between:3,8', message: 'Campo requerido')]
    public $cedula;

    public $lat;
    public $lng;

    public function getGeoLocalizacion($long, $lat)
    {
       $this->lng = $long;
       $this->lat = $lat;
    }

    public function validar()
    {
        $this->validate();

        try {

            $user = User::where('cedula', $this->cedula)->first();

            if(isset($user))
            {
                Auth::login($user);
                $user = Auth::user()->name;

                $lat = number_format($this->lat, 2, '.');
                $long = number_format($this->lng, 2, '.');

                $coords = Geolocalizacion::where('latitud', $lat)->where('longitud', $long)->first();
                if(isset($coords))
                {
                    /**Log de recorrido */
                    UtilsController::log_recorrido($user, $coords->entrada, $accion = 'Escaneo de QR exitoso');

                    return redirect(RouteServiceProvider::HOME);

                }else{

                    /**Log de recorrido */
                    UtilsController::log_recorrido($user, $coords->entrada, $accion = 'Usuario fuera de ubicacion');
                    
                    $this->notification()->error(
                        $title = 'NOTIFICACIÓN',
                        $description = 'El usuario no se encuentra en la ubicación correcta'
                    );
                }
                // dd(number_format($this->lng, 2, '.'), number_format($this->lat, 2, '.'), $user);
            }else{
                $this->notification()->error(
                    $title = 'NOTIFICACIÓN',
                    $description = 'Usuario no registrado'
                );
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.login-externo');
    }
}
