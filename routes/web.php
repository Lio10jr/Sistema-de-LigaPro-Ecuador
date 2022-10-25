<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeC;
use App\Http\Controllers\ParticipantesC;
use App\Http\Controllers\CopaEcuadorC;
use App\Http\Controllers\LigaProC;
use App\Http\Controllers\SerieAC;
use App\Http\Controllers\SerieBC;
use App\Http\Controllers\SignIn_UpC;
use App\Http\Controllers\AdminC;
use App\Http\Controllers\LogoutC;
use App\Http\Controllers\LoginC;
use App\Http\Controllers\MailsendC;
use App\Http\Controllers\EncuentrosAdminC;
use App\Http\Controllers\EquipoFavAdminC;
use App\Http\Controllers\ParticipantesAdminC;
use App\Http\Controllers\SerieAE1AdminC;
use App\Http\Controllers\SerieAE2AdminC;
use App\Http\Controllers\SerieBE1AdminC;
use App\Http\Controllers\SerieBE2AdminC;
use App\Models\Equipo_Favorito;
use App\Models\Encuentros;
use App\Mail\AlertaMailable;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//ENVIO DE EMAIL ALERTA DE EQUIPO FAVORITO.
$mailsend = new MailsendC;
$mailsend->alerta();


Route::get('/', HomeC::class);

Route::get('Home', HomeC::class)->name('home');

//Participantes
Route::controller(ParticipantesC::class)->group(function () {
    Route::get('participantes', 'index');
    Route::get('participantes/create', 'create');
    Route::get('participantes/show', 'show');
    Route::get('participantes/update', 'update');
    Route::get('participantes/delete', 'delete');
});

//SerieA
Route::controller(SerieAC::class)->group(function () {
    Route::get('SerieA', 'index');
    Route::get('SerieA/create', 'create');
    Route::get('SerieA/show', 'show');
    Route::get('SerieA/update', 'update');
    Route::get('SerieA/delete', 'delete');
});

//SerieB
Route::controller(SerieBC::class)->group(function () {
    Route::get('SerieB', 'index');
    Route::get('SerieB/create', 'create');
    Route::get('SerieB/show', 'show');
    Route::get('SerieB/update', 'update');
    Route::get('SerieB/delete', 'delete');
});

//CopaEcuador
Route::controller(CopaEcuadorC::class)->group(function () {
    Route::get('CopaEcuador', 'index');
});

//SignIn
Route::controller(SignIn_UpC::class)->group(function () {
    Route::get('SignIn_Up', 'index')->name('sign');
    Route::post('SignIn_Up/In', 'In')->name('sign.in');
    Route::get('SignIn_Up/{nota}', 'index')->name('sign.error');
    Route::post('SignIn_Up/Up', 'Up')->name('sign.up');
    Route::get('SignIn_Up/{user}/Edit', 'edit')->name('sign.edit');
    Route::put('SignIn_Up/', 'update')->name('sign.update');
});

Route::controller(LogoutC::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(LoginC::class)->group(function () {
    Route::post('/loginSesion', 'login')->name('login');
});

//VISTA DE ADMIN
Route::controller(AdminC::class)->group(function () {
    Route::get('Admin', 'index')->name('admin');
});

Route::controller(EncuentrosAdminC::class)->group(function () {
    Route::get('Encuentros', 'index')->name('encuentros');
    Route::get('Encuentros/Crear', 'create')->name('encuentros.create');
    Route::post('Encuentros/New', 'new')->name('encuentros.new');
    Route::get('Encuentros/{equipo}/Edit', 'edit')->name('encuentros.edit');
    Route::put('Encuentros/{equipo}', 'update')->name('encuentros.update');
    Route::delete('Encuentros/{equipo}', 'destroy')->name('encuentros.destroy');
});

Route::controller(EquipoFavAdminC::class)->group(function () {
    Route::get('EquipoFav', 'index')->name('equipoFav');
    Route::get('EquipoFav/Crear', 'create')->name('equipoFav.create');
    Route::post('EquipoFav/New', 'new')->name('equipoFav.new');
    Route::get('EquipoFav/{equipo}/Edit', 'edit')->name('equipoFav.edit');
    Route::put('EquipoFav/{equipo}', 'update')->name('equipoFav.update');
    Route::delete('EquipoFav/{equipo}', 'destroy')->name('equipoFav.destroy');
});

Route::controller(ParticipantesAdminC::class)->group(function () {
    Route::get('Participantes', 'index')->name('participantes');
    Route::get('Participantes/Crear', 'create')->name('participantes.create');
    Route::post('Participantes/New', 'new')->name('participantes.new');
    Route::get('Participantes/{equipo}/Edit', 'edit')->name('participantes.edit');
    Route::put('Participantes/{equipo}', 'update')->name('participantes.update');
    Route::delete('Participantes/{equipo}', 'destroy')->name('participantes.destroy');
});

Route::controller(SerieAE1AdminC::class)->group(function () {
    Route::get('SerieAE1', 'index')->name('serieAE1');
    Route::get('SerieAE1/Crear', 'create')->name('serieAE1.create');
    Route::post('SerieAE1/New', 'new')->name('serieAE1.new');
    Route::get('SerieAE1/{equipo}/Edit', 'edit')->name('serieAE1.edit');
    Route::put('SerieAE1/{equipo}', 'update')->name('serieAE1.update');
    Route::delete('SerieAE1/{equipo}', 'destroy')->name('serieAE1.destroy');
});

Route::controller(SerieAE2AdminC::class)->group(function () {
    Route::get('SerieAE2', 'index')->name('serieAE2');
    Route::get('SerieAE2/Crear', 'create')->name('serieAE2.create');
    Route::post('SerieAE2/New', 'new')->name('serieAE2.new');
    Route::get('SerieAE2/{equipo}/Edit', 'edit')->name('serieAE2.edit');
    Route::put('SerieAE2/{equipo}', 'update')->name('serieAE2.update');
    Route::delete('SerieAE2/{equipo}', 'destroy')->name('serieAE2.destroy');
});

Route::controller(SerieBE1AdminC::class)->group(function () {
    Route::get('SerieBE1', 'index')->name('serieBE1');
    Route::get('SerieBE1/Crear', 'create')->name('serieBE1.create');
    Route::post('SerieBE1/New', 'new')->name('serieBE1.new');
    Route::get('SerieBE1/{equipo}/Edit', 'edit')->name('serieBE1.edit');
    Route::put('SerieBE1/{equipo}', 'update')->name('serieBE1.update');
    Route::delete('SerieBE1/{equipo}', 'destroy')->name('serieBE1.destroy');
});

Route::controller(SerieBE2AdminC::class)->group(function () {
    Route::get('SerieBE2', 'index')->name('serieBE2');
    Route::get('SerieBE2/Crear', 'create')->name('serieBE2.create');
    Route::post('SerieBE2/New', 'new')->name('serieBE2.new');
    Route::get('SerieBE2/{equipo}/Edit', 'edit')->name('serieBE2.edit');
    Route::put('SerieBE2/{equipo}', 'update')->name('serieBE2.update');
    Route::delete('SerieBE2/{equipo}', 'destroy')->name('serieBE2.destroy');
});
