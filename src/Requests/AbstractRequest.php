<?php

namespace Applicazza\SpotoptionApiClient\Requests;

abstract class AbstractRequest
{
    protected $attributes = [];

    public function build()
    {
        return $this->attributes;
    }
}