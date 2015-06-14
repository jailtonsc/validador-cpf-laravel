<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Plano;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\FinanceiroRepositoryInterface;

class PlanoRepository extends AbstractRepository implements FinanceiroRepositoryInterface
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