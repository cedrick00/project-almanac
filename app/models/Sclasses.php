<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class sclasses extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
 	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
	protected $primaryKey = 'id';

	//protected $guarded = array('studentid','name');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'student_classes';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}

