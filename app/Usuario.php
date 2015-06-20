<?php

namespace Wempregada;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SoftDeletes;

    protected $table = 'usuario';

    protected $fillable = [
        'name',
        'email',
        'senha',
        'nome',
        'cpf',
        'bairro',
        'celular',
        'telefone',
        'cep',
        'complemento',
        'data_nascimento',
        'endereco',
        'numero',
        'ativo',
        'data_ativacao',
        'cidade_id',
        'sexo_id',
        'plano_id',
        'role'
    ];

    protected $hidden = ['senha', 'remember_token'];

    /**
     * Comverte o atributo password para senha
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * Converte a data de nascimento do formato americado para o brasileiro
     * @param $value
     * @return String
     */
    public function getDataNascimentoAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Converte a data de nascimento do formato americado para o brasileiro
     * @param $value
     * @return String
     */
    public function setDataNascimentoAttribute($value)
    {
        $this->attributes['data_nascimento'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    /**
     * Converte a data create_at do formato americado para o brasileiro
     * @param $value
     * @return String
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Converte a data de ativação do formato americado para o brasileiro
     * @param $value
     * @return String
     */
    public function getDataAtivacaoAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }


    /**
     * Relacionamentos
     */

    public function cidade()
    {
        return $this->belongsTo('Wempregada\Cidade');
    }

    public function sexo()
    {
        return $this->belongsTo('Wempregada\Sexo');
    }

    public function plano()
    {
        return $this->belongsTo('Wempregada\Plano');
    }
}
