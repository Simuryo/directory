<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateSection extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rate_sections';

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
    protected $fillable = ['name', 'column_1', 'column_2', 'column_3'];
}
