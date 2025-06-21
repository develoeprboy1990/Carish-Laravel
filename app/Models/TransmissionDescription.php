<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransmissionDescription extends Model
{
    protected $table = 'transmission_description';
    public    $timestamps  = true;
    protected $fillable = ['title', 'transmission_id', 'language_id'];
}
