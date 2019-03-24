<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "genre";

    public function histoires() {
        return $this->hasMany('App\Histoire', 'genre_id');
    }
}
