<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';

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
    protected $fillable = ['address', 'telephone', 'contact_person', 'position', 'email'];

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
