<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadiologySection extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'radiology_sections';

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
    protected $fillable = ['name', 'code', 'column_1', 'column_2', 'column_3'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }

/**
 * Eloquent Relationships
 * --------------------------------------------------------------------------
 */
        
    /**
     * Returns all the modules of this application.
     *
     * @var collection
     */
            public function entries()
            {
                return $this->hasMany(RadiologySectionEntry::class);
            }
}
