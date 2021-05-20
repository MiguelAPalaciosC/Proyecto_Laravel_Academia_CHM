<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class EmpresaFormRequest extends Request
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
            'nombre_empresa'=>'required|max:45',
            'nit'=>'required|max:256',
            'direccion'=>'required|max:45',
            'telefono'=>'required|max:45',
            'correo'=>'required|max:45',
            'informacion'=>'required|max:45',
        ];
    }
}

