<?php

namespace Applicazza\SpotoptionApiClient\Responses;

/**
 * Class Withdrawal
 * @package Applicazza\SpotoptionApiClient\Responses
 *
 * @property string $accountNumber
 * @property string $amount
 * @property string $amountUSD
 * @property string $bankName
 * @property string $bankNumber
 * @property string $branchNumber
 * @property string $campaignId
 * @property string $confirmationCode
 * @property string $confirmTime
 * @property string $confirmTimeFormatted
 * @property string $currency
 * @property string $customerId
 * @property string $customPaymentMethod
 * @property string $iban
 * @property string $id
 * @property string $paymentMethod
 * @property string $processEmployeeId
 * @property string $receptionEmployeeId
 * @property string $requestTime
 * @property string $requestTimeFormatted
 * @property string $status
 * @property string $swiftCode
 * @property string $transactionID
 * @property string $type
 */
class Withdrawal extends AbstractResponse
{
    /**
     * @var array
     */
    protected $casts = [

        'accountNumber' => 'string',
        'amount' => 'string',
        'amountUSD' => 'string',
        'bankName' => 'string',
        'bankNumber' => 'string',
        'branchNumber' => 'string',
        'campaignId' => 'string',
        'confirmationCode' => 'string',
        'confirmTime' => 'string',
        'confirmTimeFormatted' => 'string',
        'currency' => 'string',
        'customerId' => 'string',
        'customPaymentMethod' => 'string',
        'iban' => 'string',
        'id' => 'string',
        'paymentMethod' => 'string',
        'processEmployeeId' => 'string',
        'receptionEmployeeId' => 'string',
        'requestTime' => 'string',
        'requestTimeFormatted' => 'string',
        'status' => 'string',
        'swiftCode' => 'string',
        'transactionID' => 'string',
        'type' => 'string',

    ];

    /**
     * @var array
     */
    protected $fillable = [

        'accountNumber',
        'amount',
        'amountUSD',
        'bankName',
        'bankNumber',
        'branchNumber',
        'campaignId',
        'confirmationCode',
        'confirmTime',
        'confirmTimeFormatted',
        'currency',
        'customerId',
        'customPaymentMethod',
        'iban',
        'id',
        'paymentMethod',
        'processEmployeeId',
        'receptionEmployeeId',
        'requestTime',
        'requestTimeFormatted',
        'status',
        'swiftCode',
        'transactionID',
        'type',

    ];
}