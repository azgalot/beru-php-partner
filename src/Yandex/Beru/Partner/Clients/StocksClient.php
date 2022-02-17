<?php

namespace Yandex\Beru\Partner\Clients;

use Yandex\Beru\Partner\Models\Response\PostResponse;
use Yandex\Beru\Partner\Models\Response\StocksResponse;

class StocksClient extends Client
{
    /**
     * Requests information stocks
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-stocks-docpage/
     *
     * @param $response
     * @return StocksResponse
     */
    public function getStocks($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);

        return new StocksResponse($decodedResponseBody);
    }

    /**
     * Manage the stocks of offers
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/put-campaigns-id-offers-stocks.html#put-campaigns-id-offers-stocks__description
     *
     * @param $campaignId
     * @param array $params
     *
     * @return PostResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Beru\Partner\Exception\ExtendedErrorsException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function updateStocks($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/offers/stocks.json';
        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }
}
