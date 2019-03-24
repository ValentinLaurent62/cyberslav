<?php

namespace App\Http\Controllers;

use App\Avis;
use App\Histoire;
use App\Chapitre;
use App\Suite;
use App\User;
use App\Genre;
use App\Lecture;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class ControleurVisualisation extends Controller
{
    public function index() {
        $histoires = Histoire::where('active', 1)->orwhere('user_id', Auth::id())->get();
        return view("index", ['histoires' => $histoires]);
    }

    public function description($id) {
        // Récupérer les données de l'histoire
        $histoire = Histoire::where('id', $id)->first();
        if(!is_object($histoire))return view("errors.404");

        $auteur = User::where('id', $histoire->user_id)->first();
        $genre = Genre::where('id', $histoire->genre_id)->first();
        $chapitre = Chapitre::where('histoire_id', $id)->where('premier', 1)->first();

        // Récupérer le score de l'histoire
        $avis = Avis::where('histoire_id', $id)->get();
        $likes = 0;
        $dislikes = 0;
        foreach($avis as $a) {
            if($a->positif == 1)
                $likes++;
            else
                $dislikes++;
        }

        return view("apercu_histoire", ['histoire' => $histoire, 'genre' => $genre, 'auteur' => $auteur, 'chapitre' => $chapitre, 'likes' => $likes, 'dislikes' => $dislikes]);
    }

    public function chapitre($id) {
        $chapitre = Chapitre::where('id', $id)->first();
        if(!is_object($chapitre))return view("errors.404");

        $reponses = Suite::where('chapitre_source_id', $id)->get();

        // Si l'utilisateur est connecté, sauvegarder sa progression
        if(Auth::id()) {
            // Regarder s'il y a une ligne avec le chapitre source dans la table Lecture
            $cnt = Lecture::where('chapitre_id', Suite::where('id', $id)->first()->chapitre_source_id)->where('user_id', Auth::id())->get();
            if (count($cnt) > 0) {

                // récupérer le numéro de séquence le plus élevé pour l'histoire et l'utilisateur
                $ligne = Lecture::where('user_id', Auth::id())->where('histoire_id', $chapitre->histoire_id)->where('chapitre_id', '<=', $chapitre->id)->orderBy('num_sequence', 'desc')->first();
                // détruire les lignes dont le numéro de séquence est supérieur à celui récupéré
                Lecture::where('user_id', Auth::id())->where('histoire_id', $chapitre->histoire_id)->where('num_sequence', '>', $ligne->num_sequence)->delete();
                // prochain numéro de séquence
                $seq = $ligne->num_sequence+1;
            } else {

                // si non, il s'agit du premier chapitre lu
                // le numéro de sequence est donc 1
                $seq = 1;
            }

            // Insérer le chapitre dans la progression
            if(isset($ligne) && $ligne->chapitre_id != $chapitre->id || !isset($ligne)) {
                $lecture = new Lecture();
                $lecture->user_id = Auth::id();
                $lecture->histoire_id = $chapitre->histoire_id;
                $lecture->chapitre_id = $chapitre->id;
                $lecture->num_sequence = $seq;
                $lecture->save();
            }

            // Récupérer la progression entière pour la chronologie
            $progression = Lecture::where('user_id', Auth::id())->where('lecture.histoire_id', $chapitre->histoire_id)->join('chapitre', 'chapitre_id', '=', 'chapitre.id')->get();
            return view("lecture_chapitre", ['chapitre' => $chapitre, 'reponses' => $reponses, 'progression' => $progression]);
        }

        return view("lecture_chapitre", ['chapitre' => $chapitre, 'reponses' => $reponses]);
    }
}
