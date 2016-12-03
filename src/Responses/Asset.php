<?php

namespace Applicazza\SpotoptionApiClient\Responses;

/**
 * Class Asset
 * @package Applicazza\SpotoptionApiClient\Responses
 *
 * @property string $builderSuspended
 * @property string $color
 * @property string $correlation
 * @property string $id
 * @property boolean $isTradeable
 * @property string $lastUpdated
 * @property string $name
 * @property string $priceTick
 * @property float $rate
 * @property string $regularSuspended
 * @property string $showInHome
 * @property string $sixtySuspended
 * @property string $tailDigits
 * @property string $tradePrice
 * @property string $trend
 * @property string $trendType
 * @property string $type
 */
class Asset extends AbstractResponse
{
    /**
     * @var array
     */
    public $casts = [

        'builderSuspended' => 'string',
        'color' => 'string',
        'correlation' => 'string',
        'id' => 'string',
        'isTradeable' => 'boolean',
        'lastUpdated' => 'string',
        'name' => 'string',
        'priceTick' => 'string',
        'rate' => 'float',
        'regularSuspended' => 'string',
        'showInHome' => 'string',
        'sixtySuspended' => 'string',
        'tailDigits' => 'string',
        'tradePrice' => 'string',
        'trend' => 'string',
        'trendType' => 'string',
        'type' => 'string',

    ];

    /**
     * @var array
     */
    public $fillable = [

        'builderSuspended',
        'color',
        'correlation',
        'id',
        'isTradeable',
        'lastUpdated',
        'name',
        'priceTick',
        'rate',
        'regularSuspended',
        'showInHome',
        'sixtySuspended',
        'tailDigits',
        'tradePrice',
        'trend',
        'trendType',
        'type',

    ];
}