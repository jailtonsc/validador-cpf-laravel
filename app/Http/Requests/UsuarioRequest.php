<?php namespace Wempregada\Http\Requests;

use Wempregada\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'plano_id' => 'required',
            'nome' => 'required',
            'data_nascimento' => 'required|date_format:"d/m/Y"',
            'sexo_id' => 'required',
            'cpf' => 'required|unique:usuario',
            'telefone' => 'required',
            'email' => 'required|email|unique:usuario',
            'estado_id' => 'required',
            'cidade_id' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'senha' => 'required|min:6|confirmed',
            'senha_confirmation' => 'min:6|required'
        ];
    }

}
