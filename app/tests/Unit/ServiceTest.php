<?php

namespace Tests\Unit;

use App\Http\Services\CalculateService;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    /* @param CalculateService $calculateService */
    protected CalculateService $calculateService;

    protected function setUp(): void
    {
        parent::setup();
        $this->calculateService = new CalculateService();
    }

    /**
     * @throws \Exception
     */
    public function testSuccessResponse()
    {
        $result = $this->calculateService->sumDistance(1.3,"meters",2.5,"yards","yards");
        $this->assertEquals(3.92,number_format($result,2));
    }

    /**
     * @throws \Exception
     */
    public function testNegativeDistanceReturnsException()
    {
        $this->expectException(\Exception::class);
        $this->calculateService->sumDistance(-1.3,"meters",2.5,"yards","yards");
    }
}
