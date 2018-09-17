<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClinicSection extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clinic_sections';

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
    protected $fillable = ['name'];

	/**
	 * Eloquent Relationships
	 * --------------------------------------------------------------------------
	 */
		/**
         * Returns all the modules of this application.
         *
         * @var collection
         */
		public function clinic()
		{
			return $this->belongsTo(Clinic::class);
		}

    /**
     * Returns all the modules of this application.
     *
     * @var collection
     */
        public function schedules()
        {
            return $this->hasMany(ClinicSectionSchedule::class);
        }
/**
 * Action Based Functions
 * --------------------------------------------------------------------------
 */
    /**
     * Store new module of this application.
     *
     * @var collection
     */
        public function addSchedule( $schedule )
        {
            return $this->schedules()->create([
                'title' => $schedule['title'],
                'operating_hours' => $schedule['operating_hours'],
            ]);
        } 
}
