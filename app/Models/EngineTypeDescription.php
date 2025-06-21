<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngineTypeDescription extends Model
{
    protected $table = 'engine_types_description';
    public    $timestamps  = true;
    protected $fillable = ['title', 'engine_type_id', 'language_id'];
}
