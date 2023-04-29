<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    protected static function boot(){
        parent::boot();

        self::saving(function($stock){
            $stock->jenre_id =\Auth::id();
        });
    }
}
