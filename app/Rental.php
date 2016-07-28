<?php

namespace vacantrentals;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function estate(){
    	return $this->belongsTo('vacantrentals\Estate');
    }
    public function rentaltype(){
    	return $this->belongsTo('vacantrentals\Rentaltype');
    }
    public function user(){
    	return $this->belongsTo('vacantrentals\User');
    }
    
    protected $fillable=array('user_id','estate_id','rentaltype_id',
    	'title','description','price','payment','image');
    public $table='rentals';
}
