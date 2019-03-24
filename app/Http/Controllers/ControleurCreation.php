<?php

namespace App\Http\Controllers;

use App\Chapitre;
use App\Genre;
use App\Histoire;
use App\Suite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControleurCreation extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    //---------------------------------------------------------
    public function creerHistoire() {
        $genres = Genre::distinct()->get();
        return view('creer_histoire', ['genres'=>$genres]);
    }

    public function enregistrerHistoire(Request $request) {
        $this->validate(request(),[ 'titre', 'pitch', 'photo', 'genre_id']);
        $histoire = new Histoire();

        $histoire->user_id= Auth::id();
        $histoire->titre=$request['titre'];
        $histoire->pitch=$request['pitch'];
        $histoire->photo=$request['photo'];
        $histoire->genre_id=$request['genre_id'];
        $histoire->active=0;

        $histoire->save();

        return redirect(route('creer_chapitre'));

    }


    //---------------------------------------------------------

    public function creerChapitre() {
        $histoires = Histoire::get();
        return view('creer_chapitre', ['histoires'=>$histoires]);
    }

    public function enregistrerChapitre(Request $request) {
        $this->validate(request(),[ 'titre', 'titrecourt', 'texte', 'photo', 'question', 'histoire_id']);
        $chapitre = new Chapitre();

        $chapitre->titre= $request['titre'];
        $chapitre->titrecourt= $request['titrecourt'];
        $chapitre->texte= $request['texte'];
        $chapitre->photo= $request['photo'];
        $chapitre->question= $request['question'];
        $chapitre->histoire_id= $request['histoire_id'];
        $chapitre->premier= !Chapitre::where('histoire_id', $request['histoire_id'])->where('premier', 1)->first();;

        $chapitre->save();

        return redirect(route('creer_chapitre'));
    }


    //---------------------------------------------------------

    public function lierChapitre() {
        $chapitres = Chapitre::distinct()->join('histoire', 'histoire_id', '=', 'histoire.id')->where('user_id', Auth::id())->get();
        return view('lier_chapitre', ['chapitres'=>$chapitres]);
    }

    public function enregistrerLiaison(Request $request) {
        $this->validate(request(),[ 'chapitre_source_id', 'chapitre_destination_id', 'reponse']);
        $liaison = new Suite();

        $liaison->chapitre_source_id= $request['chapitre_source_id'];
        $liaison->chapitre_destination_id= $request['chapitre_destination_id'];
        $liaison->reponse= $request['reponse'];

        $liaison->save();

        return redirect(route('lier_chapitre'));
    }
}
