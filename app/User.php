<?php

namespace vacantrentals;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','surName', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

        protected $Policies=['vacantrentals\Rental'=>'vacantrentals\Policies\RentalPolicy',];
        
        public function rentals(){
        return $this->hasMany('vacantrentals\Rental');
    }
}
