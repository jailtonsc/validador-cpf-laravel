<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Plano;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\PlanoRepositoryInterface;

class PlanoRepository extends AbstractRepository implements PlanoRepositoryInterface
{
    /**
     * @param Plano $model
     */
    public function __construct(Plano $model)
    {
        /** @var Plano $model */
        $this->model = $model;
    }
}