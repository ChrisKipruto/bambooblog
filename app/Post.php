<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    # Table name
    protected $table = 'posts';

    # primary key
    public $primaryKey = 'id';

    # timestaps
    public $timestamps = true;

    # relationship with user
    public function user() {
        return $this->belongsTo('App\User');
    }

}
