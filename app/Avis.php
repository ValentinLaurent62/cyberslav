<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = "avis";
    protected $fillable = ['user_id', 'histoire_id', 'positif'];

}
