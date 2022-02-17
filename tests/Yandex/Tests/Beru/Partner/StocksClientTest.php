<?php

namespace Yandex\Tests\Beru\Partner;

use Yandex\Tests\TestCase;
use Yandex\Beru\Partner\Clients\StocksClient;

class StocksClientTest extends TestCase
{
    const CAMPAIGN_ID = 123456;

    protected $fixturesFolder = 'fixtures';

    public function testGetStocks()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/stocks.json');
        $jsonObj = json_decode($json);
        $mock = new StocksClient();

        $stocksResp = $mock->getStocks($json);
        $skus = $stocksResp->getSkus();
        $warehouseId = $stocksResp->getWarehouseId();

        $this->assertEquals(
            $jsonObj->warehouseId,
            $warehouseId
        );
        $this->assertEquals(
            $jsonObj->skus,
            $skus
        );
    }

    public function testUpdateStocks()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(StocksClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $priceResponse = $mock->updateStocks(self::CAMPAIGN_ID);
        $status = $priceResponse->getStatus();

        $this->assertEquals($jsonObj->status, $status);
    }
}
