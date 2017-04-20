<?php
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/Calc.php";

class CalcTests extends TestCase
{
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new Calc();
    }

    protected function tearDown()
    {
        $this->calculator = NULL;
    }

    public function testAdd()
    {
        $result = $this->calculator->add(1, 2);
        $this->assertEquals(3, $result);
    }

    public function testSubtract(){
        $result = $this->calculator->subtract(100,5);
        $this->assertEquals(95,$result);
    }

}