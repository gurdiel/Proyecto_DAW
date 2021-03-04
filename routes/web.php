<?php
use App\User;
use App\Clase;
use App\Docente;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/users/vista', 'AdminUsersController@vista')->name('users.vista');

Route::resource('/admin/escolares','AdminEscolaresController');

Route::resource('/admin/docentes','AdminDocentesController');

Route::resource('/admin/mensajes', 'AdminMensajesController');

Route::get('admin/mensajes/create/{id}','AdminMensajesController@create')->name('mensajes.create');

Route::resource('admin/users','AdminUsersController');

Route::get('register/docente','AdminUsersController@registerDocente')->name('register.docente');
Route::get('register/progenitor','AdminUsersController@registerProgenitor')->name('register.Progenitor');
Route::get('register/escolar','AdminUsersController@registerEscolar')->name('register.Escolar');
Route::get('register/administrador','AdminUsersController@registerAdministrador')->name('register.Administrador');


Route::get('usuarios/docente','AdminUsersController@docente')->name('usuarios.docente');
Route::get('usuarios/progenitor','AdminUsersController@progenitor')->name('usuarios.progenitor');
Route::get('usuarios/escolar','AdminUsersController@escolar')->name('usuarios.escolar');
Route::get('usuarios/administrador','AdminUsersController@administrador')->name('usuarios.administrador');


Route::get("/user/4/docente", function(){

    /*$nombre = User::all();
    foreach($nombre as $n)
        $nombres[]= $n->docente;

    return $nombres;*/
    
    $array = Docente::find(4)->clase;


    return $array;
});
