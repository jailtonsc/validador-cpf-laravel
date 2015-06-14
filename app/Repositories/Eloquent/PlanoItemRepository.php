<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\PlanoItem;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\PlanoItemRepositoryInterface;

class PlanoItemRepository extends AbstractRepository implements PlanoItemRepositoryInterface
{
    /**
     * @param PlanoItem $model
     */
    public function __construct(PlanoItem $model)
    {
        /** @var PlanoItem $model */
        $this->model = $model;
    }
}
