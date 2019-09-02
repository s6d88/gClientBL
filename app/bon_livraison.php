<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bon_livraison extends Model
{
     
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

	//protected $table='bon_livraisons';

	public function DBonLivraison()
	{
		return $this->hasOne('\App\detail_bon_livraison' , 'id_bl');
	}

	
}
