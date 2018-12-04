<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	protected $fillable = [
		'name',
		'slug',
		'braintree_plan',
		'cost',
		'description'
	];

	public function getRouteKeyName()
	{
		return 'slug';
	}
}
