<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';


	/**
	 *
	 * @var Blog
	 */
    public function blog() {
        return $this->belongsTo('Blog');
    }

}