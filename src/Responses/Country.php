<?php

namespace Applicazza\SpotoptionApiClient\Responses;

/**
 * Class Country
 * @package Applicazza\SpotoptionApiClient\Responses
 *
 * @property boolean $allowDeposit
 * @property boolean $allowRegistration
 * @property string $assetTypes
 * @property boolean $block
 * @property string $defaultLang
 * @property integer $id
 * @property boolean $isRegulated
 * @property string $iso
 * @property string $iso3
 * @property string $name
 * @property string $nationality
 * @property integer $numcode
 * @property integer $parentId
 * @property string $prefix
 */
class Country extends AbstractResponse
{
    /**
     * @var array
     */
    protected $casts = [

        'allowDeposit' => 'boolean',
        'allowRegistration' => 'boolean',
        'assetTypes' => 'string',
        'block' => 'boolean',
        'defaultLang' => 'string',
        'id' => 'integer',
        'isRegulated' => 'boolean',
        'iso' => 'string',
        'iso3' => 'string',
        'name' => 'string',
        'nationality' => 'string',
        'numcode' => 'integer',
        'parentId' => 'integer',
        'prefix' => 'string',

    ];

    /**
     * @var array
     */
    protected $fillable = [

        'allowDeposit',
        'allowRegistration',
        'assetTypes',
        'block',
        'defaultLang',
        'id',
        'isRegulated',
        'iso',
        'iso3',
        'name',
        'nationality',
        'numcode',
        'parentId',
        'prefix',

    ];
}