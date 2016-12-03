<?php

namespace Applicazza\SpotoptionApiClient\Transformers;

use Applicazza\SpotoptionApiClient\Responses;
use League\Fractal;
use SimpleXMLElement;

class DefaultTransformer extends Fractal\TransformerAbstract
{
    protected $class;

    function __construct($class)
    {
        $this->class = $class;
    }

    public function transform(SimpleXMLElement $xml)
    {

        $data = [];

        /** @var SimpleXMLElement $child */
        foreach ($xml->children() as $child) {

            $data[$child->getName()] = trim(strval($child));

        }

        return new $this->class($data);
    }
}