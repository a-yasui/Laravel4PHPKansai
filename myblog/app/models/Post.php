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
	 * 公開プロパティ？
	 *
	 * @var array
	 */
	protected $fillable = array('title', 'story');


	/**
	 *
	 * @var Blog
	 */
    public function blog() {
        return $this->belongsTo('Blog');
    }

}