##README

Validador de cpf com suporte para laravel 5.*

[![Total Downloads](https://poser.pugx.org/jailtonsc/validador-cpf-laravel/d/total.svg)](https://packagist.org/packages/jailtonsc/validador-cpf-laravel)
[![Latest Stable Version](https://poser.pugx.org/jailtonsc/validador-cpf-laravel/v/stable.svg)](https://packagist.org/packages/jailtonsc/validador-cpf-laravel)
[![Latest Unstable Version](https://poser.pugx.org/jailtonsc/validador-cpf-laravel/v/unstable.svg)](https://packagist.org/packages/jailtonsc/validador-cpf-laravel)

##Composer Instalação

composer require jailtonsc/validador-cpf-laravel

##Integração com o Laravel

No arquivo config/app.php coloque em providers a classe

```php
ValidadorCpf\CpfServiceProvider::class
```

##Integração com o Laravel 5.4.*

No arquivo config/app.php coloque em providers a classe

```php
ValidadorCpf\CpfServiceProvider54::class
```

##publish

```php
php artisan vendor:publish
```

##Alterar a mensagem de erro

No arquivo config/cpf.php você pode mudar a mensagem de erro


##Modo de usar exemplo

```php
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
```

ou

```php
$this->validate($request, [
    'cpf' => 'cpf',
]);
```
