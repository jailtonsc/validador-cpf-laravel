<?php namespace Wempregada\Http\Controllers;

use Wempregada\Http\Requests;
use Wempregada\Http\Controllers\Controller;

use Wempregada\Http\Requests\NewsletterRequest;
use Wempregada\Newsletter;

class NewsletterController extends Controller
{
    private $newsletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsletterRequest $request
     * @return Response
     */
    public function store(NewsletterRequest $request)
    {
        return $this->newsletter->create($request->all());
    }
}
