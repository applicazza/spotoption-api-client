<?php

namespace Applicazza\SpotoptionApiClient\Responses;

/**
 * Class Deposit
 * @package Applicazza\SpotoptionApiClient\Responses
 *
 * @property string $accountNumber
 * @property string $amount
 * @property string $amountUSD
 * @property string $bankName
 * @property string $bankNumber
 * @property string $bonusActivationDate
 * @property string $bonusActPoint
 * @property string $branchNumber
 * @property string $campaignId
 * @property string $cardNum
 * @property string $clearedBy
 * @property string $clearingUserID
 * @property string $confirmationCode
 * @property string $confirmTime
 * @property string $confirmTimeFormatted
 * @property string $currency
 * @property string $customerId
 * @property string $customPaymentMethod
 * @property string $externalID
 * @property string $iban
 * @property string $id
 * @property string $IPAddress
 * @property string $leverage
 * @property string $paymentMethod
 * @property string $processEmployeeId
 * @property string $rateUSD
 * @property string $receptionEmployeeId
 * @property string $requestTime
 * @property string $requestTimeFormatted
 * @property string $source
 * @property string $status
 * @property string $transactionID
 * @property string $type
 */
class Deposit extends AbstractResponse
{
    protected $casts = [

        'accountNumber' => 'string',
        'amount' => 'string',
        'amountUSD' => 'string',
        'bankName' => 'string',
        'bankNumber' => 'string',
        'bonusActivationDate' => 'string',
        'bonusActPoint' => 'string',
        'branchNumber' => 'string',
        'campaignId' => 'string',
        'cardNum' => 'string',
        'clearedBy' => 'string',
        'clearingUserID' => 'string',
        'confirmationCode' => 'string',
        'confirmTime' => 'string',
        'confirmTimeFormatted' => 'string',
        'currency' => 'string',
        'customerId' => 'string',
        'customPaymentMethod' => 'string',
        'externalID' => 'string',
        'iban' => 'string',
        'id' => 'string',
        'IPAddress' => 'string',
        'leverage' => 'string',
        'paymentMethod' => 'string',
        'processEmployeeId' => 'string',
        'rateUSD' => 'string',
        'receptionEmployeeId' => 'string',
        'requestTime' => 'string',
        'requestTimeFormatted' => 'string',
        'source' => 'string',
        'status' => 'string',
        'transactionID' => 'string',
        'type' => 'string',

    ];

    protected $fillable = [

        'accountNumber',
        'amount',
        'amountUSD',
        'bankName',
        'bankNumber',
        'bonusActivationDate',
        'bonusActPoint',
        'branchNumber',
        'campaignId',
        'cardNum',
        'clearedBy',
        'clearingUserID',
        'confirmationCode',
        'confirmTime',
        'confirmTimeFormatted',
        'currency',
        'customerId',
        'customPaymentMethod',
        'externalID',
        'iban',
        'id',
        'IPAddress',
        'leverage',
        'paymentMethod',
        'processEmployeeId',
        'rateUSD',
        'receptionEmployeeId',
        'requestTime',
        'requestTimeFormatted',
        'source',
        'status',
        'transactionID',
        'type',

    ];
}