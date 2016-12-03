<?php

use Applicazza\SpotoptionApiClient\Requests;

class FilterTest extends TestCase
{
    public function testOrWhere()
    {
        $expected = [
            'FILTER' => [
                Requests\CountryFilter::ID => [
                    0
                ],
            ]
        ];

        $filter = new Requests\CountryFilter;
        $filter->orWhere(Requests\CountryFilter::ID, '0');

        $this->assertEquals($expected, $filter->build());
    }

    public function testWhere()
    {
        $expected = [
            'FILTER' => [
                Requests\CountryFilter::ID => '0',
            ]
        ];

        $filter = new Requests\CountryFilter;
        $filter->where(Requests\CountryFilter::ID, '0');

        $this->assertEquals($expected, $filter->build());
    }

    public function testWhereMax()
    {
        $expected = [
            'FILTER' => [
                Requests\CountryFilter::ID => [
                    'max' => 0
                ],
            ]
        ];

        $filter = new Requests\CountryFilter;
        $filter->whereMax(Requests\CountryFilter::ID, '0');

        $this->assertEquals($expected, $filter->build());
    }

    public function testWhereMin()
    {
        $expected = [
            'FILTER' => [
                Requests\CountryFilter::ID => [
                    'min' => 0
                ],
            ]
        ];

        $filter = new Requests\CountryFilter;
        $filter->whereMin(Requests\CountryFilter::ID, '0');

        $this->assertEquals($expected, $filter->build());
    }

    public function testWhereNot()
    {
        $expected = [
            'FILTER' => [
                'NOT' => [
                    Requests\CountryFilter::ID => '0',
                ]
            ]
        ];

        $filter = new Requests\CountryFilter;
        $filter->whereNot(Requests\CountryFilter::ID, '0');

        $this->assertEquals($expected, $filter->build());
    }
}