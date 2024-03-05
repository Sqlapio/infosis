<?php

namespace App\Livewire;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LoginExterno extends Component
{
    #[Validate('required')]
    public $cedula;

    public function validar()
    {
        try {
            $user = User::where('cedula', $this->cedula)->first();
            if(isset($user))
            {
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
            }else{
                dd('no existe');
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
