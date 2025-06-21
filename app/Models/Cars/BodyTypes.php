<?php

namespace App;

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Model;


class BodyTypes extends Model
{
    public    $timestamps  = true;
    protected $fillable = ['api_code','name', 'name_slug', 'image','status'];
    protected $table    = "body_types";

     public function bodyType_description(){
        return $this->hasMany('App\BodyTypesDescription','body_type_id','id');
    }
}
