<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class RadiologySectionValidationRequest extends FormRequest
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
                    'name'          => 'required|min:2',
                    'code'          => 'required|min:2',
                    'column_1'      => 'required|min:2',
                    'column_2'      => 'required|min:2',
                    'column_3'      => 'required|min:2',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required|min:2',
                    'code'          => 'required|min:2',
                    'column_1'      => 'required|min:2',
                    'column_2'      => 'required|min:2',
                    'column_3'      => 'required|min:2',

                ];
            }
            default:break;
        }
    }
}
