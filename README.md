# validador-cpf-laravel
Validador de cpf com suporte para laravel 5.*

#Composer Instalação

composer require jailtonsc/validador-cpf-laravel

#Integração com o Laravel

No arquivo config/app.php em providers coloque

ValidadorCpf\CpfServiceProvider::class


#Modo de usar exemplo

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArquivoRequest extends Request
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
            'cpf' => 'cpf'
        ];
    }
}


ou


$this->validate($request, [
        'cpf' => 'cpf',
    ]);



