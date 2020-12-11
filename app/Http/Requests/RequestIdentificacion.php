<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestIdentificacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //

             'nombreresponsable'=>'required|max:50',
            'email'=>'required|max:50',
            'organismo'=>'required|max:255',
            'puesto'=>'required|max:50',
            'involucrado'=>'required|max:50',

        
            'tituloProyecto'=>'required|max:255',
            'ocid'=>'required|max:50',
            'descripcionProyecto'=>'required|max:255',
            'autoridadP'=>'required|max:50',
            'propositoProyecto'=>'required|max:100',
            'sectorProyecto'=>'required|max:50',
            'subsector'=>'required|max:50',
            'tipoProyecto'=>'required|max:50',
            'streetAddress'=>'required|max:50',
            'locality'=>'required|max:50',
            'region'=>'required|max:50',
            'postalCode'=>'required|min:5|max:5',
            'countryName'=>'required|max:50',
            'description'=>'required|max:50',

     

        ];
    }
}
