<?php

/**
 * Class Stub
 */
class Stub
{
    protected static function getStub($stub)
    {
        return file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR . $stub) ?: '';
    }

    /**
     * @return string
     */
    public static function getAssets()
    {
        return static::getStub('assets.xml');
    }

    /**
     * @return string
     */
    public static function getCountries()
    {
        return static::getStub('countries.xml');
    }

    /**
     * @return string
     */
    public static function getCustomers()
    {
        return static::getStub('customers.xml');
    }

    /**
     * @return string
     */
    public static function getDeposits()
    {
        return static::getStub('deposits.xml');
    }

    /**
     * @return string
     */
    public static function getErrorsCouldNotValidateIp()
    {
        return static::getStub('errors_could_not_validate_ip.xml');
    }

    /**
     * @return string
     */
    public static function getErrorsNoResults()
    {
        return static::getStub('errors_no_results.xml');
    }

    /**
     * @return string
     */
    public static function getErrorsNoResultsBdb()
    {
        return static::getStub('errors_no_results_bdb.xml');
    }

    /**
     * @return string
     */
    public static function getErrorsUnsupportedError()
    {
        return static::getStub('errors_unsupported_error.xml');
    }

    /**
     * @return string
     */
    public static function getOptions()
    {
        return static::getStub('options.xml');
    }

    /**
     * @return string
     */
    public static function getWithdrawals()
    {
        return static::getStub('withdrawals.xml');
    }
}