<?php

namespace Yandex\Beru\Partner\Clients;

use GuzzleHttp\Exception\GuzzleException;
use Yandex\Beru\Partner\Exception\ExtendedErrorsException;
use Yandex\Beru\Partner\Exception\PartnerRequestException;
use Yandex\Beru\Partner\Models\Response\GetOrdersStats;
use Yandex\Common\Exception\ForbiddenException;
use Yandex\Common\Exception\UnauthorizedException;

class StatsClient extends Client
{
    /**
     * Get report of orders stat by filter
     *
     * @see https://yandex.ru/dev/market/partner-api/doc/ru/reference/stats/getOrdersStats
     *
     * note: $filter default value is null because if it's will
     * be a request with empty array filter ($filter = []),
     * then the response will receive an error 400 "bad request"
     *
     * @param $campaignId
     * @param array $filter
     * @param string $pageToken
     *
     * @throws ForbiddenException
     * @throws ExtendedErrorsException
     * @throws PartnerRequestException
     * @throws GuzzleException
     * @throws UnauthorizedException
     */
    public function getOrderStats($campaignId, array $filter = null, $pageToken = null)
    {
        $baseUrl = 'campaigns/' . $campaignId . '/stats/orders';
        $resource = !is_null($pageToken) ? "{$baseUrl}?page_token={$pageToken}" : $baseUrl;

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $filter]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOrdersStats($decodedResponseBody);
    }
}
