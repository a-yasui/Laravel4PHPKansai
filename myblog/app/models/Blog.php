<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Blog extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blogs';


	/**
	 *
	 * @var User
	 */

    public function user() {
        return $this->belongsTo('User');
    }


	/**
	 *
	 * @return Array
	 */
    public function posts()
    {
        return $this->hasMany('Post');
    }
}