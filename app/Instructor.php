<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{

    protected $fillable = ['name', 'genre_id', 'picture', 'comment'];

    public function genre() {
        return $this->belongsTo('App\Genre','genre_id','id');
    }

    protected static function boot(){
        parent::boot();

        // self::saving(function($stock){
        //     $stock->genre_id =\Auth::id();
        // });
    }
}
