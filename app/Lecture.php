<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = "lecture";
    protected $fillable = ['user_id', 'histoire_id', 'chapitre_id', 'num_sequence'];

}
