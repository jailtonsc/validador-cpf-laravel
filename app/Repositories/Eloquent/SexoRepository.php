<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Sexo;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\SexoRepositoryInterface;

class SexoRepository extends AbstractRepository implements SexoRepositoryInterface
{
    /**
     * @param Sexo $model
     */
    public function __construct(Sexo $model)
    {
        /** @var Sexo $model */
        $this->model = $model;
    }
}