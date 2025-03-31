<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Wager;

class WagerTransactionControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * testBuyWithValidParam
     *
     * @param $params
     * @param $statusCode
     * @param $expected
     * @return void
     */
    #[DataProvider('buyWithValidParamDataProvider')]
    public function testBuyWithValidParam($params, $statusCode, $expected)
    {
        $wager = Wager::factory()->create();
        $this->json('POST', 'api/buy/' . $params['wager_id'], $params['buying_price'])
            ->assertStatus($statusCode)
            ->assertJsonStructure($expected);
    }

    /**
     * buyWithValidParamDataProvider
     *
     * @return array
     */
    public static function buyWithValidParamDataProvider(): array
    {
        return [
            [
                'params' => [
                    'wager_id' => 1,
                    'buying_price' => ['buying_price' => 10]
                ],
                'statusCode' => 201,
                'expected' => ['wager_id', 'buying_price', 'bought_at']
            ],
        ];
    }

    /**
     * testBuyWithInvalidParam
     *
     * @param $params
     * @param $statusCode
     * @param $expected
     * @return void
     */
    #[DataProvider('buyWithInvalidParamDataProvider')]
    public function testBuyWithInvalidParam($params, $statusCode, $expected)
    {
        $wager = Wager::factory()->create();
        $this->json('POST', 'api/buy/' . $params['wager_id'], $params['buying_price'])
            ->assertStatus($statusCode)
            ->assertJson($expected);
    }

    public static function buyWithInvalidParamDataProvider(): array
    {
        return [
            [
                'params' => [
                    'wager_id' => 'text',
                    'buying_price' => ['buying_price' => 51]
                ],
                'statusCode' => 400,
                'expected' => ['error' => 'The wager id must be an integer.']
            ],
            [
                'params' => [
                    'wager_id' => 1,
                    'buying_price' => ['buying_price' => -1]
                ],
                'statusCode' => 400,
                'expected' => ['error' => 'The buying price must be greater than 0.']
            ],
            [
                'params' => [
                    'wager_id' => 2,
                    'buying_price' => ['buying_price' => 51]
                ],
                'statusCode' => 400,
                'expected' => ['error' => 'The selected wager id is invalid.']
            ],
            [
                'params' => [
                    'wager_id' => 1,
                    'buying_price' => ['buying_price' => 99]
                ],
                'statusCode' => 400,
                'expected' => ['error' => 'Cannot buy this wager.']
            ]
        ];
    }
}
