<?php

namespace App\Http\Requests;

use Auth;

use Illuminate\Foundation\Http\FormRequest;

class ClinicValidationRequest extends FormRequest
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
                    'name'      => 'required|min:2',
                    'ext'       => 'required|min:4',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'      => 'required|min:2',
                    'ext'       => 'required|min:4',

                ];
            }
            default:break;
        }
    }
}
