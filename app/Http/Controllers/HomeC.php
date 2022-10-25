<?php

namespace App\Http\Controllers;

use App\Mail\AlertaMailable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mailgun\Mailgun;

use Illuminate\Support\Facades\Mail;

class HomeC extends Controller
{
    public function alert(Carbon $dateFav){
        

    }
    public function __invoke(){
        //$this->alert();
        return view('home');
    }
}
