<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suite extends Model
{
    protected $table = "suite";
    protected $fillable = [ 'chapitre_source_id', 'chapitre_destination_id', 'reponse'];

}
