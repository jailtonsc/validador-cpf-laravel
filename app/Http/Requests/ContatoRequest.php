<?php namespace Wempregada\Http\Requests;

use Wempregada\Http\Requests\Request;

class ContatoRequest extends Request
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
            'nome' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required',
        ];
    }
}
