<?php
use App\User;
use App\Clase;

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



Route::resource('admin/users','AdminUsersController');

Route::get("/user/4/docente", function(){

    /*$nombre = User::all();
    foreach($nombre as $n)
        $nombres[]= $n->docente;

    return $nombres;*/

    return Clase::find()->docente_id=3;
});
