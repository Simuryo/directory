<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sections';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'operating_hours', 'head', 'ext'];

	/**
	 * Eloquent Relationships
	 * --------------------------------------------------------------------------
	 */
		/**
         * Returns all the modules of this application.
         *
         * @var collection
         */
		public function service()
		{
			return $this->belongsTo(Service::class);
		}
}
