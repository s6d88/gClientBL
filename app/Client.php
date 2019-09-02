<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function BonLivraison()
	{
		return $this->hasMany('\App\bon_livraison' , 'id_client');
	}
}
