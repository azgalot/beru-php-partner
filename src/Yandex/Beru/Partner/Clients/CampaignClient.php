<?php

namespace Yandex\Beru\Partner\Clients;

use GuzzleHttp\Exception\GuzzleException;
use Yandex\Beru\Partner\Exception\ExtendedErrorsException;
use Yandex\Beru\Partner\Exception\PartnerRequestException;
use Yandex\Beru\Partner\Models\Response\GetCampaignsResponse;
use Yandex\Common\Exception\ForbiddenException;
use Yandex\Common\Exception\UnauthorizedException;

class CampaignClient extends Client
{
    /**
     * @throws ExtendedErrorsException
     * @throws ForbiddenException
     * @throws PartnerRequestException
     * @throws GuzzleException
     * @throws UnauthorizedException
     */
    public function getCampaigns()
    {
        $resource = 'campaigns';

        $response = $this->sendRequest(
            'GET',
            $this->getServiceUrl($resource)
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetCampaignsResponse($decodedResponseBody);
    }
}
