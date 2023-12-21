<?php

namespace Beru\Partner;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Yandex\Beru\Partner\Clients\StatsClient;
use Yandex\Beru\Partner\Exception\ExtendedErrorsException;
use Yandex\Beru\Partner\Exception\PartnerRequestException;
use Yandex\Beru\Partner\Models\Stats\CommissionStats;
use Yandex\Beru\Partner\Models\Stats\DetailStats;
use Yandex\Beru\Partner\Models\Stats\OrderItemStats;
use Yandex\Beru\Partner\Models\Stats\OrderStats;
use Yandex\Beru\Partner\Models\Stats\PaymentStats;
use Yandex\Beru\Partner\Models\Stats\PriceStats;
use Yandex\Common\Exception\ForbiddenException;
use Yandex\Common\Exception\UnauthorizedException;
use Yandex\Tests\TestCase;

class StatsClientTest extends TestCase
{
    const CAMPAIGN_ID = 123456;

    const FILTER = [
        'orders' => [330818349, 330762173]
    ];

    protected $fixturesFolder = 'fixtures';

    /**
     * @throws ForbiddenException
     * @throws ExtendedErrorsException
     * @throws PartnerRequestException
     * @throws GuzzleException
     * @throws UnauthorizedException
     */
    public function testGetOrderStats()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getOrderStats.json');
        $jsonObj = json_decode($json);

        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(StatsClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $orderStats = $mock->getOrderStats(self::CAMPAIGN_ID, self::FILTER);

        $this->assertEquals(
            $jsonObj->status,
            $orderStats->getStatus()
        );

        $this->assertEquals(
            count($jsonObj->result->orders),
            count($orderStats->getResult()->getOrders())
        );

        $this->assertEquals(
            $jsonObj->result->paging->nextPageToken,
            $orderStats->getResult()->getPaging()->getNextPageToken()
        );

        /** @var OrderStats[]  $orderStatsAsArray */
        $orderStatsAsArray = $orderStats->getResult()->getOrders()->getAll();

        for ($i=0; $i < count($orderStatsAsArray); $i++) {
            $this->assertEquals(
                $jsonObj->result->orders[$i]->id,
                $orderStatsAsArray[$i]->getId()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->creationDate,
                $orderStatsAsArray[$i]->getCreationDate()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->statusUpdateDate,
                $orderStatsAsArray[$i]->getStatusUpdateDate()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->partnerOrderId,
                $orderStatsAsArray[$i]->getPartnerOrderId()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->status,
                $orderStatsAsArray[$i]->getStatus()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->paymentType,
                $orderStatsAsArray[$i]->getPaymentType()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->fake,
                $orderStatsAsArray[$i]->getFake()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->deliveryRegion->id,
                $orderStatsAsArray[$i]->getDeliveryRegion()->getId()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->deliveryRegion->name,
                $orderStatsAsArray[$i]->getDeliveryRegion()->getName()
            );

            if (!is_null($orderStatsAsArray[$i]->getItems())) {
                /** @var OrderItemStats[] $itemsStatsAsArray */
                $itemsStatsAsArray = $orderStatsAsArray[$i]->getItems()->getAll();
                $this->checkItems($itemsStatsAsArray, $jsonObj, $i);
            }
            if (!is_null($orderStatsAsArray[$i]->getInitialItems())) {
                /** @var OrderItemStats[] $itemsStatsAsArray */
                $initialItemsStatsAsArray = $orderStatsAsArray[$i]->getInitialItems()->getAll();
                $this->checkItems($initialItemsStatsAsArray, $jsonObj, $i);
            }

            /** @var PaymentStats[] $paymentsAsArray */
            $paymentsAsArray = $orderStatsAsArray[$i]->getPayments()->getAll();
            for($n = 0; $n < $orderStatsAsArray[$i]->getPayments()->count(); $n++) {
                $this->assertEquals(
                    $jsonObj->result->orders[$i]->payments[$n]->id,
                    $paymentsAsArray[$n]->getId()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->payments[$n]->date,
                    $paymentsAsArray[$n]->getDate()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->payments[$n]->type,
                    $paymentsAsArray[$n]->getType()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->payments[$n]->source,
                    $paymentsAsArray[$n]->getSource()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->payments[$n]->total,
                    $paymentsAsArray[$n]->getTotal()
                );

                if (property_exists($jsonObj->result->orders[$i]->payments[$n], 'paymentOrder')) {
                    $this->assertEquals(
                        $jsonObj->result->orders[$i]->payments[$n]->paymentOrder->id,
                        $paymentsAsArray[$n]->getPaymentOrder()->getId()
                    );

                    $this->assertEquals(
                        $jsonObj->result->orders[$i]->payments[$n]->paymentOrder->date,
                        $paymentsAsArray[$n]->getPaymentOrder()->getDate()
                    );
                }
            }

            /** @var CommissionStats[] $commissionAsArray */
            $commissionAsArray = $orderStatsAsArray[$i]->getCommissions()->getAll();
            for($x = 0; $x < $orderStatsAsArray[$i]->getCommissions()->count(); $x++) {
                $this->assertEquals(
                    $jsonObj->result->orders[$i]->commissions[$x]->type,
                    $commissionAsArray[$x]->getType()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->commissions[$x]->actual,
                    $commissionAsArray[$x]->getActual()
                );
            }
        }
    }

    /**
     * @param OrderItemStats[] $itemsStatsAsArray
     * @param $jsonObj
     * @param int $i
     * @return void
     */
    private function checkItems($itemsStatsAsArray, $jsonObj, $i)
    {
        for($j = 0; $j < count($itemsStatsAsArray); $j++) {
            $this->assertEquals(
                $jsonObj->result->orders[$i]->items[$j]->offerName,
                $itemsStatsAsArray[$j]->getOfferName()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->items[$j]->marketSku,
                $itemsStatsAsArray[$j]->getMarketSku()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->items[$j]->shopSku,
                $itemsStatsAsArray[$j]->getShopSku()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->items[$j]->count,
                $itemsStatsAsArray[$j]->getCount()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->items[$j]->bidFee,
                $itemsStatsAsArray[$j]->getBidFee()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->items[$j]->warehouse->id,
                $itemsStatsAsArray[$j]->getWarehouse()->getId()
            );

            $this->assertEquals(
                $jsonObj->result->orders[$i]->items[$j]->warehouse->name,
                $itemsStatsAsArray[$j]->getWarehouse()->getName()
            );

            for($k = 0; $k < count($itemsStatsAsArray[$j]->getCisList()); $k++) {
                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->cisList[$k],
                    $itemsStatsAsArray[$j]->getCisList()[$k]
                );
            }

            /** @var PriceStats[] $pricesAsArray */
            $pricesAsArray = $itemsStatsAsArray[$j]->getPrices()->getAll();
            for($t = 0; $t < $itemsStatsAsArray[$j]->getPrices()->count(); $t++) {
                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->prices[$t]->type,
                    $pricesAsArray[$t]->getType()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->prices[$t]->costPerItem,
                    $pricesAsArray[$t]->getCostPerItem()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->prices[$t]->total,
                    $pricesAsArray[$t]->getTotal()
                );
            }

            /** @var DetailStats[] $detailsAsArray */
            $detailsAsArray = $itemsStatsAsArray[$j]->getDetails()->getAll();
            for($v = 0; $v < $itemsStatsAsArray[$v]->getDetails()->count(); $v++) {
                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->details[$v]->itemCount,
                    $detailsAsArray[$v]->getItemCount()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->details[$v]->itemStatus,
                    $detailsAsArray[$v]->getItemStatus()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->details[$v]->updateDate,
                    $detailsAsArray[$v]->getUpdateDate()
                );

                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->details[$v]->stockType,
                    $detailsAsArray[$v]->getStockType()
                );
            }

            if (property_exists($jsonObj->result->orders[$i]->items[$j], 'initialCount')) {
                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->initialCount,
                    $itemsStatsAsArray[$j]->getInitialCount()
                );
            }

            if (property_exists($jsonObj->result->orders[$i]->items[$j], 'cofinanceValue')) {
                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->cofinanceValue,
                    $itemsStatsAsArray[$j]->getCofinanceValue()
                );
            }

            if (property_exists($jsonObj->result->orders[$i]->items[$j], 'cofinanceThreshold')) {
                $this->assertEquals(
                    $jsonObj->result->orders[$i]->items[$j]->cofinanceThreshold,
                    $itemsStatsAsArray[$j]->getCofinanceThreshold()
                );
            }
        }
    }
}
