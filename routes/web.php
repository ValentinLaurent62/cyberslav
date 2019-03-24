<?php

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

use Illuminate\Support\Facades\DB;
use App\Histoire;
use App\Avis;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'ControleurVisualisation@index')->name('home');

Route::get('/histoire/creer', 'ControleurCreation@creerHistoire')->name('creer_histoire');
Route::post('/histoire/enregistrer', 'ControleurCreation@enregistrerHistoire')->name('enregistrer_histoire');

Route::get('/chapitre/creer', 'ControleurCreation@creerChapitre')->name('creer_chapitre');
Route::post('/chapitre/enregistrer', 'ControleurCreation@enregistrerChapitre')->name('enregistrer_chapitre');

Route::get('/chapitre/lier', 'ControleurCreation@lierChapitre')->name('lier_chapitre');
Route::post('/chapitre/lier/enregistrer', 'ControleurCreation@enregistrerLiaison')->name('enregistrer_liaison');

// page de présentation de l'histoire
Route::get('/histoire/{id}', 'ControleurVisualisation@description')->name('show');

// page de lecture de chapitre
Route::get('/chapitre/{id}', 'ControleurVisualisation@chapitre')->name('read');

// empêcher le MethodNotAllowedException pour les hax0rs
Route::get('histoire/{id}/switch', function() {
    return new RedirectResponse('.');
});

// dés-activation d'une histoire
Route::post('histoire/{id}/switch', function($id) {
    if (Auth::id() == Histoire::where('id', $id)->first()->user_id)
        Histoire::where('id', $id)->update(array('active' => !Histoire::where('id', $id)->first()->active));
    return new RedirectResponse('.');
})->name('switch');

// empêcher le MethodNotAllowedException pour les hax0rs
Route::get('histoire/{id}/like', function() {
    return new RedirectResponse('.');
});

// liker une histoire
Route::post('histoire/{id}/like', function($id) {
    // ne pas liker sa propre histoire
    if(Histoire::where('id', $id)->first()->user_id != Auth::id()) {
        if (count(Avis::where('user_id', Auth::id())->where('histoire_id', $id)->get()) > 0)
            // s'il y a déjà un avis, le supprimer
            Avis::where('user_id', Auth::id())->where('histoire_id', $id)->delete();
        else
            // sinon, l'insérer
            Avis::insert(array('user_id' => Auth::id(), 'histoire_id' => $id, 'positif' => 1));
    }
    return new RedirectResponse('.');
})->name('like');

// empêcher le MethodNotAllowedException pour les hax0rs
Route::get('histoire/{id}/dislike', function() {
    return new RedirectResponse('.');
});

// disliker une histoire
Route::post('histoire/{id}/dislike', function($id) {
    // ne pas liker sa propre histoire
    if(Histoire::where('id', $id)->first()->user_id != Auth::id()) {
        if (count(Avis::where('user_id', Auth::id())->where('histoire_id', $id)->get()) > 0)
            // s'il y a déjà un avis, le supprimer
            Avis::where('user_id', Auth::id())->where('histoire_id', $id)->delete();
        else
            // sinon, l'insérer
            Avis::insert(array('user_id' => Auth::id(), 'histoire_id' => $id, 'positif' => 0));
    }
    return new RedirectResponse('.');
})->name('dislike');