<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Financeiro;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\FinanceiroRepositoryInterface;

class FinanceiroRepository extends AbstractRepository implements FinanceiroRepositoryInterface
{
    /**
     * @param Financeiro $model
     */
    public function __construct(Financeiro $model)
    {
        /** @var Financeiro $model */
        $this->model = $model;
    }
}