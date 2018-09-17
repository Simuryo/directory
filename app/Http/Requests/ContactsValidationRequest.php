<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class ContactsValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if( Auth::check() ){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        switch ( $this->method() ) {
            case 'GET':
            case 'DELETE':
            {
                return [
                    'password' => 'required|min:5'
                ];
            }
            case 'POST':
            {
                return [
                    'address'          => 'required|min:5',
                    'telephone'        => 'required|min:5',
                    'contact_person'   => 'required|min:2',
                    'position'         => 'required|min:2',
                    'email'            => 'required|email',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'address'          => 'required|min:5',
                    'telephone'        => 'required|min:5',
                    'contact_person'   => 'required|min:5',
                    'position'         => 'required|min:5',
                    'email'              => 'required|email',

                ];
            }
            default:break;
        }
    }
}
