<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histoire extends Model {
    protected $table = "histoire";
    protected $fillable = ['user_id', 'titre', 'pitch', 'photo', 'genre_id'];


    public function utilisateur() {
        return $this->belongsTo("App\User", "user_id");
    }


    public function chapitres() {
        return $this->hasMany("App\Chapitre", "histoire_id");
    }

    public function premierChapitre() {
        return $this->chapitres()->whereRaw("premier=1")->first();
    }


    public function genre() {
        return $this->belongsTo("App\Genre", "genre_id");
    }
}
