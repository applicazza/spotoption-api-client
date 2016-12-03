<?php

namespace Applicazza\SpotoptionApiClient;

use Applicazza\SpotoptionApiClient\Requests;
use Applicazza\SpotoptionApiClient\Responses;
use Applicazza\SpotoptionApiClient\Transformers;
use GuzzleHttp;
use Illuminate\Foundation\Application;
use League\Fractal as LeagueFractal;
use Psr\Http;
use Spatie\Fractal as SpatieFractal;

/**
 * Class SpotoptionApiClient
 * @package Applicazza\SpotoptionApiClient
 */
class SpotoptionApiClient
{
    /**
     * Request timeout
     */
    const TIMEOUT = 30;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * SpotoptionApiClient constructor.
     * @param callable $handler
     */
    function __construct(callable $handler = null)
    {
        $guzzle_client_handler = GuzzleHttp\HandlerStack::create($handler);

        $guzzle_client_handler->push(GuzzleHttp\Middleware::mapRequest(function(Http\Message\RequestInterface $request) {

            if (class_exists(Application::class)) {

                $body = $request->getBody()->getContents();

                event(new Events\RequestSent($request->getUri(), $body));
            }

            return $request;

        }));

        $guzzle_client_options['handler'] = $guzzle_client_handler;
        $guzzle_client_options['timeout'] = static::TIMEOUT;

        $this->guzzle = new GuzzleHttp\Client($guzzle_client_options);

        libxml_use_internal_errors(true);
    }

    /**
     * @var string
     */
    protected $proxy;

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param string $proxy
     */
    public function setProxy(string $proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * @var integer
     */
    protected $timeout = 0;

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint(string $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @var string
     */
    protected $username;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @var string
     */
    protected $password;

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @param \Applicazza\SpotoptionApiClient\Requests\AssetFilter $filter
     * @param int $limit
     * @param int $skip
     * @return Responses\Asset[]
     */
    public function getAssets(Requests\AssetFilter $filter = null, $limit = 500, $skip = 0) : array
    {
        return $this->search('Assets', 'view', $filter, new Transformers\DefaultTransformer(Responses\Asset::class));
    }

    /**
     * @param \Applicazza\SpotoptionApiClient\Requests\CountryFilter $filter
     * @param int $limit
     * @param int $skip
     * @return \Applicazza\SpotoptionApiClient\Responses\Country[]
     */
    public function getCountries(Requests\CountryFilter $filter = null, $limit = 500, $skip = 0) : array
    {
        return $this->search('Country', 'view', $filter, new Transformers\DefaultTransformer(Responses\Country::class));
    }

    /**
     * @param \Applicazza\SpotoptionApiClient\Requests\CustomerFilter $filter
     * @param int $limit
     * @param int $skip
     * @return \Applicazza\SpotoptionApiClient\Responses\Customer[]
     */
    public function getCustomers(Requests\CustomerFilter $filter = null, $limit = 500, $skip = 0) : array
    {
        return $this->search('Customer', 'view', $filter, new Transformers\DefaultTransformer(Responses\Customer::class));
    }

    /**
     * @param \Applicazza\SpotoptionApiClient\Requests\DepositFilter $filter
     * @param int $limit
     * @param int $skip
     * @return \Applicazza\SpotoptionApiClient\Responses\Deposit[]
     */
    public function getDeposits(Requests\DepositFilter $filter = null, $limit = 500, $skip = 0) : array
    {
        return $this->search('CustomerDeposits', 'view', $filter, new Transformers\DefaultTransformer(Responses\Deposit::class));
    }

    /**
     * @param \Applicazza\SpotoptionApiClient\Requests\OptionFilter $filter
     * @param int $limit
     * @param int $skip
     * @return \Applicazza\SpotoptionApiClient\Responses\Option[]
     */
    public function getOptions(Requests\OptionFilter $filter = null, $limit = 500, $skip = 0) : array
    {
        return $this->search('Options', 'view', $filter, new Transformers\DefaultTransformer(Responses\Option::class));
    }

    /**
     * @param \Applicazza\SpotoptionApiClient\Requests\WithdrawalFilter $filter
     * @param int $limit
     * @param int $skip
     * @return \Applicazza\SpotoptionApiClient\Responses\Withdrawal[]
     */
    public function getWithdrawals(Requests\WithdrawalFilter $filter = null, $limit = 500, $skip = 0) : array
    {
        return $this->search('Withdrawal', 'view', $filter, new Transformers\DefaultTransformer(Responses\Withdrawal::class));
    }

    protected function search(string $module, string $command, Requests\AbstractFilter $filter = null, LeagueFractal\TransformerAbstract $transformer, $limit = 500, $skip = 0)
    {
        $xml = $this->sendRequest($module, $command, $filter, $limit, $skip);

        return is_null($xml) ? [] : fractal()
            ->collection($xml->xpath('//*[contains(local-name(), "data_")]'))
            ->transformWith($transformer)
            ->serializeWith(new SpatieFractal\ArraySerializer)
            ->toArray();
    }

    /**
     * @param string $module
     * @param string $command
     * @param \Applicazza\SpotoptionApiClient\Requests\AbstractRequest|null $request
     * @param int $limit
     * @param int $skip
     * @return \SimpleXMLElement
     * @throws \Applicazza\SpotoptionApiClient\Exceptions\CouldNotValidateIpException
     * @throws \Applicazza\SpotoptionApiClient\Exceptions\NetworkException
     * @throws \Applicazza\SpotoptionApiClient\Exceptions\ResponseErrorException
     * @throws \Applicazza\SpotoptionApiClient\Exceptions\UnexpectedResponseException
     */
    protected function sendRequest(string $module, string $command, Requests\AbstractRequest $request = null, $limit = 500, $skip = 0)
    {
        $options = [

            'form_params' => [

                'api_username' => $this->username,

                'api_password' => $this->password,

                'MODULE' => $module,

                'COMMAND' => $command,

            ],

        ];

        if (!is_null($request))
            $options['form_params'] = array_merge_recursive($options['form_params'], $request->build());

        if ($this->getProxy())
            $options['proxy']['http'] = $options['proxy']['https'] = $this->getProxy();

        if ($this->getTimeout() > 0)
            $options['timeout'] = $this->getTimeout();

        $options['form_params']['LIMIT'] = [

            'recordsToShow' => $limit,

            'recordStart' => $skip,

        ];

        try {

            $stream = $this->guzzle->post('', $options);

            $xml = simplexml_load_string($stream->getBody()->getContents());

            if ($xml === false)
                throw new Exceptions\UnexpectedResponseException;

            if (count($xml->xpath('errors/error/message[text()="CouldNotValidateIP"]'))) {

                throw new Exceptions\CouldNotValidateIpException;
            }

            if (strval($xml->connection_status) == 'successful' && strval($xml->operation_status) == 'failed') {

                if (count($xml->xpath('errors/error[text()[normalize-space(.)="noResults"]]'))) {

                    throw new Exceptions\NoResultsErrorException;

                }

                if (count($xml->xpath('errors/error/error[text()[normalize-space(.)="noResults"]]'))) {

                    throw new Exceptions\NoResultsErrorException;

                }

                throw new Exceptions\ResponseErrorException($xml);

            }

            return $xml->$module ?? $xml->{strtolower($module)} ;

        } catch (Exceptions\NoResultsErrorException $e) {

            return null;

        } catch (GuzzleHttp\Exception\ConnectException $e) {

            throw new Exceptions\NetworkException;

        } catch (GuzzleHttp\Exception\RequestException $e) {

            throw new Exceptions\NetworkException;

        } catch (GuzzleHttp\Exception\TransferException $e) {

            throw new Exceptions\NetworkException;

        }
    }
}