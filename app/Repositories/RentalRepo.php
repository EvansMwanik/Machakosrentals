<?php namespace vacantrentals\Repositories;
use vacantrentals\User;
use vacantrentals\Rental;
use paginate;

class RentalRepo{
	/**
	*get all of the rentals for a given user 
	*
	*@param User $user
	*@return collection
	*/
	public function forUser(user $user){
		return Rental::where('user_id', $user->id)->paginate(6);
	}
}