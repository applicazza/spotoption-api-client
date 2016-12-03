<?php

use Applicazza\SpotoptionApiClient\Events;
use Applicazza\SpotoptionApiClient\Exceptions;
use Applicazza\SpotoptionApiClient\Requests;
use Applicazza\SpotoptionApiClient\SpotoptionApiClient;

class SpotoptionApiClientTest extends TestCase
{
    protected $endpoint = 'http://test.spotplatform.com/api';

    protected $username = 'demoUsername';

    protected $password = 'demoPassword';

    protected $proxy = 'socks5://127.0.0.1:8080';

    protected $timeout = 60;

    public function testProxy()
    {
        $client = $this->getClient();

        $this->assertEquals($this->proxy, $client->getProxy());
    }

    public function testTimeout()
    {
        $client = $this->getClient();

        $this->assertEquals($this->timeout, $client->getTimeout());
    }

    public function testCredentials()
    {
        $client = $this->getClient();

        $this->assertEquals($this->endpoint, $client->getEndpoint());
        $this->assertEquals($this->username, $client->getUsername());
        $this->assertEquals($this->password, $client->getPassword());
    }

    public function testGetAssets()
    {
        $this->expectsEvents(Events\RequestSent::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getAssets()),
        ]);

        $client = $this->getClient($mock);

        $assets = $client->getAssets();

        $this->assertEquals(2, $assets[0]->id);
        $this->assertEquals('USD/JPY', $assets[0]->name);
        $this->assertEquals(78.43200000, $assets[0]->rate);
    }

    public function testGetCountries()
    {
        $this->expectsEvents(Events\RequestSent::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getCountries()),
        ]);

        $client = $this->getClient($mock);

        $filter = new Requests\CountryFilter();
        $filter->where(Requests\CountryFilter::ID, 0);

        $countries = $client->getCountries($filter);

        $afghanistan = $countries[1];

        $this->assertEquals(1, $afghanistan->id);
        $this->assertEquals(false, $afghanistan->block);
        $this->assertEquals(true, $afghanistan->allowDeposit);
        $this->assertEquals(false, $afghanistan->allowRegistration);
        $this->assertEquals(false, $afghanistan->isRegulated);
        $this->assertEquals('AF', $afghanistan->iso);
        $this->assertEquals('AFG', $afghanistan->iso3);
        $this->assertEquals('Afghanistan', $afghanistan->name);
        $this->assertEquals(93, $afghanistan->prefix);
    }

    public function testGetCustomers()
    {
        $this->expectsEvents(Events\RequestSent::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getCustomers()),
        ]);

        $client = $this->getClient($mock);

        $customers = $client->getCustomers();

        $this->assertEquals(1, $customers[0]->id);
    }

    public function testGetDeposits()
    {
        $this->expectsEvents(Events\RequestSent::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getDeposits()),
        ]);

        $client = $this->getClient($mock);

        $deposits = $client->getDeposits();

        $this->assertEquals(1, $deposits[0]->id);
    }

    public function testGetOptions()
    {
        $this->expectsEvents(Events\RequestSent::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getOptions()),
        ]);

        $client = $this->getClient($mock);

        $options = $client->getOptions();

        $this->assertEquals(1, $options[0]->id);
    }

    public function testGetWithdrawals()
    {
        $this->expectsEvents(Events\RequestSent::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getWithdrawals()),
        ]);

        $client = $this->getClient($mock);

        $withdrawals = $client->getWithdrawals();

        $this->assertEquals(1, $withdrawals[0]->id);
    }

    public function testConnectException()
    {
        $this->expectException(Exceptions\NetworkException::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Exception\ConnectException('', new GuzzleHttp\Psr7\Request('GET', ''))
        ]);

        $client = $this->getClient($mock);

        $client->getCountries();
    }

    public function testRequestException()
    {
        $this->expectException(Exceptions\NetworkException::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Exception\RequestException('', new GuzzleHttp\Psr7\Request('GET', ''))
        ]);

        $client = $this->getClient($mock);

        $client->getCountries();
    }

    public function testTransferException()
    {
        $this->expectException(Exceptions\NetworkException::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Exception\TransferException()
        ]);

        $client = $this->getClient($mock);

        $client->getCountries();
    }

    public function testCouldNotValidateIpException()
    {
        $this->expectException(Exceptions\CouldNotValidateIpException::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getErrorsCouldNotValidateIp()),
        ]);

        $client = $this->getClient($mock);

        $client->getCountries();
    }

    public function testUnexpectedResponseException()
    {
        $this->expectException(Exceptions\UnexpectedResponseException::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], 'Uga chaga'),
        ]);

        $client = $this->getClient($mock);

        $client->getCountries();
    }

    public function testNoResultsErrorException()
    {
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getErrorsNoResults()),
        ]);

        $client = $this->getClient($mock);

        $countries = $client->getCountries();

        $this->assertEquals([], $countries);
    }

    public function testNoResultsErrorExceptionBdb()
    {
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getErrorsNoResultsBdb()),
        ]);

        $client = $this->getClient($mock);

        $countries = $client->getCountries();

        $this->assertEquals([], $countries);
    }

    public function testResponseErrorException()
    {
        $this->expectException(Exceptions\ResponseErrorException::class);

        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], Stub::getErrorsUnsupportedError()),
        ]);

        $client = $this->getClient($mock);

        $client->getCountries();
    }

    protected function getClient(GuzzleHttp\Handler\MockHandler $mock = null)
    {
        $client = new SpotoptionApiClient($mock);

        $client->setEndpoint($this->endpoint);
        $client->setUsername($this->username);
        $client->setPassword($this->password);

        $client->setTimeout($this->timeout);

        $client->setProxy($this->proxy);

        return $client;
    }
}
