<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicSectionSchedule extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clinic_section_schedules';

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
    protected $fillable = ['title', 'operating_hours'];

	/**
	 * Eloquent Relationships
	 * --------------------------------------------------------------------------
	 */
		/**
         * Returns all the modules of this application.
         *
         * @var collection
         */
		public function section()
		{
			return $this->belongsTo(ClinicSection::class);
		}
  
}
