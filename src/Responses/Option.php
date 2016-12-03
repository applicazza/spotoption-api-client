<?php

namespace Applicazza\SpotoptionApiClient\Responses;

/**
 * Class Option
 * @package Applicazza\SpotoptionApiClient\Responses
 *
 * @property string $assetId
 * @property string $assetName
 * @property string $bmoSuspended
 * @property string $callPositionsAmount
 * @property string $callPositionsNum
 * @property string $color
 * @property string $endDate
 * @property string $endRate
 * @property string $endTradePrice
 * @property string $goalRate
 * @property string $id
 * @property string $isWeekendOption
 * @property string $lastPositionTime
 * @property string $lastUpdateDate
 * @property string $loss
 * @property string $maxBuyOutTime
 * @property string $multiplier
 * @property string $noPositionTime
 * @property string $noRolloverTime
 * @property string $optionType
 * @property string $ownedBy
 * @property string $pricePer
 * @property string $priceTick
 * @property string $profit
 * @property string $putPositionsAmount
 * @property string $putPositionsNum
 * @property string $ruleId
 * @property string $sixtySeconds
 * @property string $startDate
 * @property string $status
 * @property string $suspended
 * @property string $type
 * @property string $VIPGroup
 */
class Option extends AbstractResponse
{
    /**
     * @var array
     */
    protected $casts = [

        'assetId' => 'string',
        'assetName' => 'string',
        'bmoSuspended' => 'string',
        'callPositionsAmount' => 'string',
        'callPositionsNum' => 'string',
        'color' => 'string',
        'endDate' => 'string',
        'endRate' => 'string',
        'endTradePrice' => 'string',
        'goalRate' => 'string',
        'id' => 'string',
        'isWeekendOption' => 'string',
        'lastPositionTime' => 'string',
        'lastUpdateDate' => 'string',
        'loss' => 'string',
        'maxBuyOutTime' => 'string',
        'multiplier' => 'string',
        'noPositionTime' => 'string',
        'noRolloverTime' => 'string',
        'optionType' => 'string',
        'ownedBy' => 'string',
        'pricePer' => 'string',
        'priceTick' => 'string',
        'profit' => 'string',
        'putPositionsAmount' => 'string',
        'putPositionsNum' => 'string',
        'ruleId' => 'string',
        'sixtySeconds' => 'string',
        'startDate' => 'string',
        'status' => 'string',
        'suspended' => 'string',
        'type' => 'string',
        'VIPGroup' => 'string',

    ];

    /**
     * @var array
     */
    protected $fillable = [

        'assetId',
        'assetName',
        'bmoSuspended',
        'callPositionsAmount',
        'callPositionsNum',
        'color',
        'endDate',
        'endRate',
        'endTradePrice',
        'goalRate',
        'id',
        'isWeekendOption',
        'lastPositionTime',
        'lastUpdateDate',
        'loss',
        'maxBuyOutTime',
        'multiplier',
        'noPositionTime',
        'noRolloverTime',
        'optionType',
        'ownedBy',
        'pricePer',
        'priceTick',
        'profit',
        'putPositionsAmount',
        'putPositionsNum',
        'ruleId',
        'sixtySeconds',
        'startDate',
        'status',
        'suspended',
        'type',
        'VIPGroup',

    ];
}