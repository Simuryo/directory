<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clinics';

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
    protected $fillable = ['name', 'ext'];

/**
 * Eloquent Relationships
 * --------------------------------------------------------------------------
 */
        
    /**
     * Returns all the modules of this application.
     *
     * @var collection
     */
        public function sections()
        {
            return $this->hasMany(ClinicSection::class);
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
        public function addSection( $section )
        {
            return $this->sections()->create([
                'name' => $section['name'],
            ]);
        }   

}
