<?php

namespace Applicazza\SpotoptionApiClient\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class RequestSent
 * @package Applicazza\SpotoptionApiClient\Events
 */
class RequestSent
{
    use SerializesModels;

    /**
     * @var string
     */
    public $uri;

    /**
     * @var string
     */
    public $payload;

    /**
     * RequestSent constructor.
     * @param string $uri
     * @param string $payload
     */
    function __construct(string $uri, string $payload)
    {
        $this->uri = $uri;

        $this->payload = $payload;
    }
}