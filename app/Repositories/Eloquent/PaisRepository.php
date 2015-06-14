<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Pais;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\FinanceiroRepositoryInterface;

class PaisRepository extends AbstractRepository implements FinanceiroRepositoryInterface
{
    /**
     * @param Pais $model
     */
    public function __construct(Pais $model)
    {
        /** @var Pais $model */
        $this->model = $model;
    }
}