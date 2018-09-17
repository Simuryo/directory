<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadiologySectionEntry extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'radiology_section_entries';

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
    protected $fillable = ['name', 'price_1', 'price_2'];


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
                return $this->belongsTo(RadiologySection::class);
            }
}
