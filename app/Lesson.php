<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title', 'instructor_id', 'start', 'finish', 'color'];

    public function genre() {
        return $this->belongsTo('App\Instructor','instructor_id','id');
    }


    protected static function boot(){
        parent::boot();

        self::saving(function($stock){
            $stock->instructor_id =\Auth::id();
        });
    }


}
