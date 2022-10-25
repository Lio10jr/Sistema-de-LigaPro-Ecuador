<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginC extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            return back()->withErrors([
                'message' => 'El usuario y la contraseña es incorrecta, Por favor intente de nuevo'
            ]);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return $this->authenticated($request, $user);
    }
    public function authenticated(Request $request, $user){
        $name_user = auth()->user()->nom_user;
        $data = User::where('nom_user', $name_user)->first();

        if($data->rol == 'admin')
        {
            return redirect()->route('admin');
        } else{
            return redirect()->route('home');
        }
    }
}
