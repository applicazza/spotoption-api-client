<?php

namespace Applicazza\SpotoptionApiClient\Responses;

/**
 * Class Customer
 * @package Applicazza\SpotoptionApiClient\Responses
 *
 * @property string $accountBalance
 * @property string $affiliateId
 * @property string $approvesEmailAds
 * @property string $aptNumber
 * @property string $a_aid
 * @property string $a_bid
 * @property string $a_cid
 * @property string $birthday
 * @property string $callBackTime
 * @property string $campaignId
 * @property string $campaignName
 * @property string $cellphone
 * @property string $City
 * @property string $Country
 * @property string $countryId
 * @property string $currency
 * @property string $currencySign
 * @property string $customerSelectedLang
 * @property string $deskId
 * @property string $email
 * @property string $employeeInChargeId
 * @property string $employeeInChargeName
 * @property string $fax
 * @property string $firstDepositDate
 * @property string $FirstName
 * @property string $gender
 * @property string $group
 * @property string $houseNumber
 * @property string $id
 * @property string $isBlackList
 * @property string $isDemo
 * @property string $isLead
 * @property string $isSuspended
 * @property string $lastLoginDate
 * @property string $LastName
 * @property string $lastTimeActive
 * @property string $lastTimeActiveNoFormat
 * @property string $lastUpdate
 * @property string $leadConversionDate
 * @property string $leadConversionSource
 * @property string $leadStatus
 * @property string $newCustomer
 * @property string $password
 * @property string $personalId
 * @property string $phone
 * @property string $Platform
 * @property string $pnl
 * @property string $postCode
 * @property string $potential
 * @property string $promotionalEmails
 * @property string $referLink
 * @property string $ReferToken
 * @property string $regIP
 * @property string $registrationCountry
 * @property string $regStatus
 * @property string $regTime
 * @property string $regTimeFormatted
 * @property string $regulateStatus
 * @property string $risk
 * @property string $saleStatus
 * @property string $siteLanguage
 * @property string $sourcePlatformId
 * @property string $specialAccountNumber
 * @property string $state
 * @property string $street
 * @property string $subCampaignId
 * @property string $subCampaignParam
 * @property string $timezone
 * @property string $tradingEmails
 * @property string $type
 * @property string $verification
 * @property string $VIPGroup
 */
class Customer extends AbstractResponse
{
    /**
     * @var array
     */
    protected $casts = [

        'accountBalance' => 'string',
        'affiliateId' => 'string',
        'approvesEmailAds' => 'string',
        'aptNumber' => 'string',
        'a_aid' => 'string',
        'a_bid' => 'string',
        'a_cid' => 'string',
        'birthday' => 'string',
        'callBackTime' => 'string',
        'campaignId' => 'string',
        'campaignName' => 'string',
        'cellphone' => 'string',
        'City' => 'string',
        'Country' => 'string',
        'countryId' => 'string',
        'currency' => 'string',
        'currencySign' => 'string',
        'customerSelectedLang' => 'string',
        'deskId' => 'string',
        'email' => 'string',
        'employeeInChargeId' => 'string',
        'employeeInChargeName' => 'string',
        'fax' => 'string',
        'firstDepositDate' => 'string',
        'FirstName' => 'string',
        'gender' => 'string',
        'group' => 'string',
        'houseNumber' => 'string',
        'id' => 'string',
        'isBlackList' => 'string',
        'isDemo' => 'string',
        'isLead' => 'string',
        'isSuspended' => 'string',
        'lastLoginDate' => 'string',
        'LastName' => 'string',
        'lastTimeActive' => 'string',
        'lastTimeActiveNoFormat' => 'string',
        'lastUpdate' => 'string',
        'leadConversionDate' => 'string',
        'leadConversionSource' => 'string',
        'leadStatus' => 'string',
        'newCustomer' => 'string',
        'password' => 'string',
        'personalId' => 'string',
        'phone' => 'string',
        'Platform' => 'string',
        'pnl' => 'string',
        'postCode' => 'string',
        'potential' => 'string',
        'promotionalEmails' => 'string',
        'referLink' => 'string',
        'ReferToken' => 'string',
        'regIP' => 'string',
        'registrationCountry' => 'string',
        'regStatus' => 'string',
        'regTime' => 'string',
        'regTimeFormatted' => 'string',
        'regulateStatus' => 'string',
        'risk' => 'string',
        'saleStatus' => 'string',
        'siteLanguage' => 'string',
        'sourcePlatformId' => 'string',
        'specialAccountNumber' => 'string',
        'state' => 'string',
        'street' => 'string',
        'subCampaignId' => 'string',
        'subCampaignParam' => 'string',
        'timezone' => 'string',
        'tradingEmails' => 'string',
        'type' => 'string',
        'verification' => 'string',
        'VIPGroup' => 'string',

    ];

    /**
     * @var array
     */
    protected $fillable = [

        'accountBalance',
        'affiliateId',
        'approvesEmailAds',
        'aptNumber',
        'a_aid',
        'a_bid',
        'a_cid',
        'birthday',
        'callBackTime',
        'campaignId',
        'campaignName',
        'cellphone',
        'City',
        'Country',
        'countryId',
        'currency',
        'currencySign',
        'customerSelectedLang',
        'deskId',
        'email',
        'employeeInChargeId',
        'employeeInChargeName',
        'fax',
        'firstDepositDate',
        'FirstName',
        'gender',
        'group',
        'houseNumber',
        'id',
        'isBlackList',
        'isDemo',
        'isLead',
        'isSuspended',
        'lastLoginDate',
        'LastName',
        'lastTimeActive',
        'lastTimeActiveNoFormat',
        'lastUpdate',
        'leadConversionDate',
        'leadConversionSource',
        'leadStatus',
        'newCustomer',
        'password',
        'personalId',
        'phone',
        'Platform',
        'pnl',
        'postCode',
        'potential',
        'promotionalEmails',
        'referLink',
        'ReferToken',
        'regIP',
        'registrationCountry',
        'regStatus',
        'regTime',
        'regTimeFormatted',
        'regulateStatus',
        'risk',
        'saleStatus',
        'siteLanguage',
        'sourcePlatformId',
        'specialAccountNumber',
        'state',
        'street',
        'subCampaignId',
        'subCampaignParam',
        'timezone',
        'tradingEmails',
        'type',
        'verification',
        'VIPGroup',

    ];
}