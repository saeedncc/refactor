<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class WillExpireAtTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
		$due_time='2023-10-23 03:10:10';
		$created_at='2023-10-22 03:10:10';
        $response=TeHelper::willExpireAt($due_time, $created_at);
		$this->assertSame($response,'2023-10-23 03:10:10');
		
		
		$due_time='2023-10-18 03:10:10';
		$created_at='2023-10-22 03:10:10';
        $response=TeHelper::willExpireAt($due_time, $created_at);
		$this->assertSame($response,'2023-10-18 03:10:10');
		
		
		$due_time='2023-10-30 03:10:10';
		$created_at='2023-10-20 03:10:10';
        $response=TeHelper::willExpireAt($due_time, $created_at);
		$this->assertSame($response,'2023-10-28 03:10:10');
		
		
    }
}
