<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model {
    protected $table = "chapitre";
    protected $fillable = [ 'titre', 'titrecourt', 'texte', 'photo', 'question', 'histoire_id', 'premier'];

    public function histoire() {
        return $this->belongsTo('App\Histoire', 'histoire_id');
    }


    public function suites() {
        return $this->belongsToMany("App\Chapitre", "suite", "chapitre_source_id", "chapitre_destination_id")->withPivot('reponse');;
    }
}
