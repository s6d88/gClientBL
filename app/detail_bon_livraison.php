<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class detail_bon_livraison extends Model
{
    
    //protected $table='detail_bon_livraisons';

    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
}
