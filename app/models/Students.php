<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Carbon\Carbon;

class Students extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
 	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	protected $primaryKey = 'id';
	protected $fillable = array('firstname','lastname','email','birthday' );


	public function scopeId($query)
    {
        return $query->where('id','>',29);
    }
    public function phone()
    {
    	return $this->hasMany('Phones','sid');
    }

     public function sclasses()
    {
        return $this->belongsToMany('Sclasses','sid');
    }

    public function getDates()
    {
    	return['created_at'];
    }
    public function ScopeIdPara($query,$id)
    {
    	return $query->where('id','>',$id);
    }
    public function ScopeLastname($query,$lastname)
    {
    	return $query->where('lastname','like','%'.$lastname.'%');
    }

      public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }



	//protected $guarded = array('studentid','name');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'students';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}

