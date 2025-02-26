<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\SecondLargestService;

class SecondLargestServiceTest extends TestCase
{
    public function testFindSecondLargest()
    {
        $service = new SecondLargestService();

        // Test case 1: Normal array
        $result = $service->findSecondLargest([3, 5, 1, 9, 7]);
        $this->assertEquals(7, $result);

        // Test case 2: All numbers in ascending order
        $result = $service->findSecondLargest([10, 20, 30, 40, 50]);
        $this->assertEquals(40, $result);

        // Test case 3: Duplicate numbers
        $result = $service->findSecondLargest([5, 5, 5, 5]);
        $this->assertEquals(PHP_INT_MIN, $result);

        // Test case 4: Single element array
        $result = $service->findSecondLargest([2]);
        $this->assertEquals(PHP_INT_MIN, $result);

        // Test case 5: Negative numbers
        $result = $service->findSecondLargest([-10, -20, -30, -40, -50]);
        $this->assertEquals(-20, $result);
    }
}
