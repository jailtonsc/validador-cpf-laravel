<?php namespace Wempregada\Http\Controllers;

use Wempregada\Http\Requests;

use Wempregada\Http\Requests\NewsletterRequest;
use Wempregada\Repositories\Contracts\NewsletterRepositoryInterface;

class NewsletterController extends Controller
{
    private $newsletter;

    public function __construct(NewsletterRepositoryInterface $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @param NewsletterRequest $request
     * @return Response
     */
    public function store(NewsletterRequest $request)
    {
        return $this->newsletter->salvar($request->all());
    }
}
