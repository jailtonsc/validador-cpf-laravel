<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Item;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\ItemRepositoryInterface;

class ItemRepository extends AbstractRepository implements ItemRepositoryInterface
{
    /**
     * @param Item $model
     */
    public function __construct(Item $model)
    {
        /** @var Item $model */
        $this->model = $model;
    }
}