<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Estado;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\EstadoRepositoryInterface;

class EstadoRepository extends AbstractRepository implements EstadoRepositoryInterface
{
    /**
     * @param Estado $model
     */
    public function __construct(Estado $model)
    {
        /** @var Estado $model */
        $this->model = $model;
    }
}