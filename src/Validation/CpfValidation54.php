<?php

namespace ValidadorCpf\Validation;

use Illuminate\Container\Container;

/**
 * Class CpfValidation54
 * @package ValidadorCpf\Validation
 */
class CpfValidation54
{
    /**
     * @var mixed
     */
    private $app;

    /**
     * @var
     */
    private $value;

    /**
     * CpfValidation54 constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->app = $this->app();
        $this->value =  $value;
    }

    /**
     * @return mixed
     */
    private function app()
    {
        return Container::getInstance()->make('config');
    }

    /**
     * @param $digitos
     * @param int $posicoes
     * @param int $somaDigitos
     * @return string
     */
    private function calcularDigitosPosicoes($digitos, $posicoes = 10, $somaDigitos = 0)
    {
        for ($i = 0; $i < strlen($digitos); $i++) {
            $somaDigitos = $somaDigitos + ($digitos[$i] * $posicoes);
            $posicoes--;
            if ($posicoes < 2) {
                $posicoes = 9;
            }
        }
        $somaDigitos = $somaDigitos % 11;

        if ($somaDigitos < 2) {
            $somaDigitos = 0;
        } else {
            $somaDigitos = 11 - $somaDigitos;
        }
        $cpf = $digitos . $somaDigitos;
        return $cpf;
    }

    /**
     * @param $value
     * @return bool
     */
    private function verificarIgualdade($value)
    {
        $caracteres = str_split($value);
        $todosIguais = true;
        $lastVal = $caracteres[0];
        foreach ($caracteres as $val) {
            if ($lastVal != $val) {
                $todosIguais = false;
            }
            $lastVal = $val;
        }
        return $todosIguais;
    }

    /**
     * @param $value
     * @return mixed
     */
    private function removerCaracteres($value){
        return str_replace(['.', '-', '_'], '', $value);
    }

    /**
     * @return bool
     */
    public function validarCpf()
    {
        $value = $this->removerCaracteres($this->value);
        $digitos = substr($value, 0, 9);
        $novoCpf = $this->calcularDigitosPosicoes($digitos);
        $novoCpf = $this->calcularDigitosPosicoes($novoCpf, 11);

        if ($this->verificarIgualdade($value)) {
            return false;
        }

        if ($novoCpf === $value) {
            return true;
        }
        return false;
    }

}
