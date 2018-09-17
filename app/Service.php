<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

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
    protected $fillable = ['name', 'head', 'position'];

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
				return $this->hasMany(Section::class);
			}

		/**
     * Returns all the modules of this application.
     *
     * @var collection
     */
			public function contacts()
			{
				return $this->hasOne(Contacts::class);
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
				'name' 						=> $section['name'],
				'operating_hours' => $section['operating_hours'],
				'head' 						=> $section['head'],
				'ext' 						=> $section['ext'],
			]);
		}	

		/**
         * Store new module of this application.
         *
         * @var collection
         */
		public function addContacts( $contacts )
		{
			return $this->contacts()->create([
				'address' 				=> $contacts['address'],
				'telephone' 			=> $contacts['telephone'],
				'contact_person' 	=> $contacts['contact_person'],
				'position' 				=> $contacts['position'],
				'email' 					=> $contacts['email'],
			]);
		}	

}
