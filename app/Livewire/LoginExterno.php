<?php

namespace App\Livewire;

use App\Models\User;
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

    #[Validate('required')]
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
        try {
            $user = User::where('cedula', $this->cedula)->first();
            if(isset($user))
            {
                Auth::login($user);
                dd(number_format($this->lng, 4, '.'), number_format($this->lat, 4, '.'));
                return redirect(RouteServiceProvider::HOME);
            }else{
                $this->notification()->error(
                    $title = 'NOTIFICACIÓN',
                    $description = 'Usuario no registrado'
                );
                // session()->flash('xy', 'Usuario no registrado');
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
