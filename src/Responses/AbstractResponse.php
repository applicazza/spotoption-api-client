<?php

namespace Applicazza\SpotoptionApiClient\Responses;

/**
 * Class AbstractResponse
 * @package Applicazza\SpotoptionApiClient\Responses
 */
abstract class AbstractResponse
{
    /**
     * @var array
     */
    protected $casts = [];

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @var array
     */
    private $properties = [];

    /**
     * Country constructor.
     * @param array $data
     */
    function __construct(array $data = [])
    {
        $this->fill($data);
    }

    /**
     * @param $property
     * @return mixed|null
     */
    public function __get($property)
    {
        if (array_key_exists($property, $this->properties))
            return $this->properties[$property];

        return null;
    }

    /**
     * @param $property
     * @param $value
     */
    public function __set($property, $value)
    {
        if (count($this->fillable) && !in_array($property, $this->fillable))
            return;

        $type = array_key_exists($property, $this->casts) ? $this->casts[$property] : 'string';

        switch ($type) {

            case 'boolean':
                settype($value, 'boolean');
                break;

            case 'float':
                settype($value, 'float');
                break;

            case 'integer':
                settype($value, 'integer');
                break;

            case 'string':
            default:
                settype($value, 'string');

        }

        $this->properties[$property] = $value;
    }

    /**
     * @param array $data
     * @return self
     */
    public function fill(array $data)
    {
        foreach ($data as $property => $value) {

            $this->{$property} = $value;

        }

        return $this;
    }

    /**
     * @param null $property
     * @return array|mixed|null
     */
    public function get($property = null)
    {
        if (is_null($property))
            return $this->properties;
        else
            return array_key_exists($property, $this->properties) ? $this->properties[$property] : null;
    }
}