<?php

namespace Applicazza\SpotoptionApiClient\Requests;

/**
 * Class AbstractFilter
 * @package Applicazza\SpotoptionApiClient\Requests
 */
abstract class AbstractFilter extends AbstractRequest
{
    /**
     * @param $attribute
     * @param $operator
     * @param null $value
     * @return $this
     */
    public function where($attribute, $operator, $value = null)
    {
        if (!in_array($operator, ['=', '!=', '>=', '<='])) {

            $value = $operator;
            $operator = '=';

        }

        switch ($operator) {

            case '=':
                $this->attributes[$attribute] = $value;
                break;

            case '!=':
                $this->attributes['NOT'][$attribute] = $value;
                break;

            case '>=':
                $this->attributes[$attribute]['min'] = $value;
                break;

            case '<=':
                $this->attributes[$attribute]['max'] = $value;
                break;

        }

        return $this;
    }

    /**
     * @param $attribute
     * @param $value
     * @return AbstractFilter
     */
    public function whereNot($attribute, $value)
    {
        return $this->where($attribute, '!=', $value);
    }

    /**
     * @param $attribute
     * @param $value
     * @return AbstractFilter
     */
    public function whereMax($attribute, $value)
    {
        return $this->where($attribute, '<=', $value);
    }

    /**
     * @param $attribute
     * @param $value
     * @return AbstractFilter
     */
    public function whereMin($attribute, $value)
    {
        return $this->where($attribute, '>=', $value);
    }

    /**
     * @param $attribute
     * @param null $value
     * @return $this
     */
    public function orWhere($attribute, $value = null)
    {
        $this->attributes[$attribute][] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function build()
    {
        return ['FILTER' => $this->attributes];
    }
}