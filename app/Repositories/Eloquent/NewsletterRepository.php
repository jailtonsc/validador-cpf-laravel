<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Newsletter;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\NewsletterRepositoryInterface;

class NewsletterRepository extends AbstractRepository implements NewsletterRepositoryInterface
{
    /**
     * @param Newsletter $model
     */
    public function __construct(Newsletter $model)
    {
        /** @var Newsletter $model */
        $this->model = $model;
    }
}