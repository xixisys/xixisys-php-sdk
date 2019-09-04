<?php

namespace XiXisys;

use Exception;
use GuzzleHttp\Client;

final class Sdk
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $baseUri = 'https://dlfrsthy47.execute-api.cn-north-1.amazonaws.com.cn/production/';

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Api-Key' => $this->apiKey,
            ]
        ]);
    }

    /**
     * @param string $cas
     * @param string $edition
     * @return string|null
     */
    public function sdsHtmlUrl($cas, $edition = 'ghs')
    {
        try {
            $query = compact('cas', 'edition');
            $response = $this->client->get('v1/sds/html', compact('query'));
            $jsonArr = json_decode((string)$response->getBody(), true);

            return $jsonArr['data'];
        } catch (Exception $exception) {
            return null;
        }
    }

    /**
     * @param string $cas
     * @param string $edition
     * @return string|null
     */
    public function sdsHtml($cas, $edition = 'ghs') {
        $url = $this->sdsHtmlUrl($cas, $edition);
        return $this->html($url);
    }

    /**
     * @param string $cas
     * @return string|null
     */
    public function complianceHtmlUrl($cas)
    {
        try {
            $query = compact('cas');
            $response = $this->client->get('v1/compliance/html', compact('query'));
            $jsonArr = json_decode((string)$response->getBody(), true);

            return $jsonArr['data'];
        } catch (Exception $exception) {
            return null;
        }
    }

    /**
     * @param string $cas
     * @return string|null
     */
    public function complianceHtml($cas)
    {
        $url = $this->complianceHtmlUrl($cas);
        return $this->html($url);
    }

    /**
     * @param string $url
     * @return false|string|null
     */
    protected function html($url)
    {
        if ($url) {
            return file_get_contents($url);
        }

        return null;
    }
}