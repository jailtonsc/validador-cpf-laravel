<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Usuario;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\UsuarioRepositoryInterface;

class UsuarioRepository extends AbstractRepository implements UsuarioRepositoryInterface
{
    /**
     * @param Usuario $model
     */
    public function __construct(Usuario $model)
    {
        /** @var Usuario $model */
        $this->model = $model;
    }
}
