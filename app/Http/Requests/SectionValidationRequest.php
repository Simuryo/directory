<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class SectionValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if (Auth::check()) {
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
        // /dd( request()->all() );
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
                    'name'              => 'required|min:5',
                    'head'              => 'required|min:5',
                    'operating_hours'   => 'required|min:2',
                    'ext'               => 'required',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'              => 'required|min:5',
                    'head'              => 'required|min:5',
                    'operating_hours'   => 'required|min:2',
                    'ext'               => 'required',

                ];
            }
            default:break;
        }
    }
}
