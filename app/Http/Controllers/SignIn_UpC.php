<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class SignIn_UpC extends Controller
{
    public function index(){
        if(Auth::check()){
            $name_user = auth()->user()->nom_user;
            $data = User::where('nom_user', $name_user)->first();

            if($data->rol == 'admin')
            {
                return redirect()->route('admin');
            } else{
                return redirect()->route('home');
            }
        }
        //$user = Login::all(); //recupera todos los user
        // $user = Login::where('nom:user', $nom_user)->orderby('edad', 'desc')->get();
         //$user = Login::select('nom_user', 'email')->get();
        return view('SignIn-Up');
        // return $user;
    }

    public function In(){
        // $user = new Login;

        // try{
        //     $user->nom_user = $request->username1;
        //     $user->clave = $request->password1;

        //     if(Login::where('nom_user', $user->nom_user)->count() > 0){
        //         $data = Login::where('nom_user', $user->nom_user)->first();
        //         if ( $data->nom_user == $user->nom_user && $data->clave == $user->clave){
        //             return view('Home');
        //         }else{
        //             $nota = "No coinciden los datos";
        //             return redirect()->route('sign.error', compact('nota'));
        //         }
        //     }else{
        //         $nota = "Credenciales son incorrectas";
        //         return redirect()->route('sign.error', compact('nota'));
        //     }
    
        // }catch(Exception $e){
        //     // $nota = "Ocurrio un error al enviar los datos " .$e;
        //     // return redirect()->route('sign', $nota); 
        // }   
           
        if(auth()->attempt(request(['email', 'password'])) == false)
        {
            return back()->withErrors([
                'message' => 'El usuario y la contraseña es incorrecta, Por favor intente de nuevo'
            ]);
        }else{
            $name_user = auth()->user()->nom_user;
            $data = User::where('nom_user', $name_user)->first();

            if($data->rol == 'admin')
            {
                return redirect()->route('admin');
            } else{
                return redirect()->route('/');
            }
        }
        
    }
    
    public function Up(){ 
        $user = User::create(request(['nom_user', 'nombre', 'apellido', 'fecha_nacimiento', 'email', 'password']));
        auth()->login($user);
        $name_user = auth()->user()->nom_user;
        $data = User::where('nom_user', $name_user)->first();

        if($data->rol == 'admin')
        {
            return redirect()->route('admin');
        } else{
            return redirect()->route('home');
        }        
    }

    public function edit(Login $id){

    }

    public function update(Request $request){
        try{
            if($request->username != 'value1'){
                $user1 = User::where('nom_user', $request->username)->first();
                $user1->rol = 'admin';

                $user1->save();
            }
            $user = User::where('rol',null)->orderBy('id', 'asc')->get();
            return redirect()->route('admin', compact('user'));

        }catch(Exception $e){
            echo "Error al guardar datos " .$e;
        }        
    }

    public function show(Login $user){
        // $user = Login::find($id);

        // $user = Login::where('nom_user', $nom_user)->first(); 
        // $user->email;

        //$user = Login::where('nom:user', $nom_user)->get();
        return view('SignIn-Up');
    }
}
