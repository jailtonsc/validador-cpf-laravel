<?php

namespace ValidadorCpf\Validation;

use Illuminate\Validation\Validator as IlluminateValidator;

/**
 * Class Cpf
 * @package Util\Services\Validation
 */
class Cpf extends IlluminateValidator
{

    /**
     * @var array
     */
    private $_custom_messages = [
        "cpf" => "The :attribute may only contain letters, spaces, and dashes."
    ];

    /**
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     */
    public function __construct($translator, $data, $rules, $messages = array(), $customAttributes = array())
    {
        parent::__construct($translator, $data, $rules, $messages, $customAttributes);

        $this->_set_custom_stuff();
    }

    /**
     * Setup any customizations etc
     *
     * @return void
     */
    protected function _set_custom_stuff()
    {
        $this->setCustomMessages($this->_custom_messages);
    }

    /**
     * @param $digitos
     * @param int $posicoes
     * @param int $soma_digitos
     * @return string
     */
    protected function calc_digitos_posicoes($digitos, $posicoes = 10, $soma_digitos = 0)
    {
        // Faz a soma dos dígitos com a posição
        // Ex. para 10 posições:
        //   0    2    5    4    6    2    8    8   4
        // x10   x9   x8   x7   x6   x5   x4   x3  x2
        //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
        for ($i = 0; $i < strlen($digitos); $i++) {
            // Preenche a soma com o dígito vezes a posição
            $soma_digitos = $soma_digitos + ($digitos[$i] * $posicoes);

            // Subtrai 1 da posição
            $posicoes--;

            // Parte específica para CNPJ
            // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
            if ($posicoes < 2) {
                // Retorno a posição para 9
                $posicoes = 9;
            }
        }

        // Captura o resto da divisão entre $soma_digitos dividido por 11
        // Ex.: 196 % 11 = 9
        $soma_digitos = $soma_digitos % 11;

        // Verifica se $soma_digitos é menor que 2
        if ($soma_digitos < 2) {
            // $soma_digitos agora será zero
            $soma_digitos = 0;
        } else {
            // Se for maior que 2, o resultado é 11 menos $soma_digitos
            // Ex.: 11 - 9 = 2
            // Nosso dígito procurado é 2
            $soma_digitos = 11 - $soma_digitos;
        }

        // Concatena mais um dígito aos primeiro nove dígitos
        // Ex.: 025462884 + 2 = 0254628842
        $cpf = $digitos . $soma_digitos;

        // Retorna
        return $cpf;
    }

    /**
     * @param $value
     * @return bool
     */
    protected function verifica_igualdade($value)
    {
        // Todos os caracteres em um array
        $caracteres = str_split($value);

        // Considera que todos os números são iguais
        $todos_iguais = true;

        // Primeiro caractere
        $last_val = $caracteres[0];

        // Verifica todos os caracteres para detectar diferença
        foreach ($caracteres as $val) {

            // Se o último valor for diferente do anterior, já temos
            // um número diferente no CPF ou CNPJ
            if ($last_val != $val) {
                $todos_iguais = false;
            }

            // Grava o último número checado
            $last_val = $val;
        }

        // Retorna true para todos os números iguais
        // ou falso para todos os números diferentes
        return $todos_iguais;
    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function validateCpf($attribute, $value)
    {
        // Captura os 9 primeiros dígitos do CPF
        // Ex.: 02546288423 = 025462884
        $digitos = substr($value, 0, 9);

        // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
        $novo_cpf = $this->calc_digitos_posicoes($digitos);

        // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
        $novo_cpf = $this->calc_digitos_posicoes($novo_cpf, 11);

        // Verifica se todos os números são iguais
        if ($this->verifica_igualdade($value)) {
            return false;
        }

        // Verifica se o novo CPF gerado é idêntico ao CPF enviado
        if ($novo_cpf === $value) {
            // CPF válido
            return true;
        }

        // CPF inválido
        return false;
    }
}
