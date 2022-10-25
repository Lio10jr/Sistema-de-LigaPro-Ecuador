<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participantes;
use App\Models\User;

class AdminC extends Controller
{
    public function index(){
        $user = User::where('rol',null)->orderBy('id', 'asc')->get();
        return view('admins.admin', compact('user'));
    }
}
