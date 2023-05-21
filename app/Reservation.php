<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'lesson_id'];

    public function lesson() {
        return $this->belongsTo('App\Lesson','lesson_id','id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }



    protected static function boot(){
        parent::boot();

        }
    

}
