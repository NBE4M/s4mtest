<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'authors';
     protected $primaryKey = 'author_id';



     public function aauthor()
    {
        return $this->belongsTo('App\Aauthor');
    }

}
