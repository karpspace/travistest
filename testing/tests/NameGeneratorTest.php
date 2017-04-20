<?php
use PHPUnit\Framework\TestCase;

//require __DIR__ . "/../src/NameGenerator.php";
//require __DIR__ . "/../src/Exceptions/NotANumberException.php";


class NameGeneratorTests extends TestCase
{
    private $ng;

    protected function setUp()
    {

        $fail = $this->getMockBuilder('Fail')
                     ->setMethods(['fails'])
                     ->getMock();

        $fail->method('fails')->willReturn(true);
        $this->ng = new NameGenerator($fail, 100);
    }

    protected function tearDown()
    {
        $this->ng = NULL;
    }

    public function testSetLength()
    {
        $this->ng->setLength(100);
        $this->assertEquals(100, $this->ng->length);
    }


    public function testSetCharacters()
    {
        $this->ng->setCharacters(['a', 'b']);
        $this->assertEquals(['a', 'b'], $this->ng->characters);
    }

    public function testGenNameOnCustomCharacters()
    {
        $this->setName($this->ng->generateName());
        $this->assertContainsOnly('string', ['a', 'b']);
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testNameLength($length)
    {
        $this->ng->setLength($length);
        $this->assertEquals($length, strlen($this->ng->generateName()));
    }

    public function testUpperFirstLetter()
    {
        $this->ng->setName($this->ng->generateName());
        $this->ng->upperFirstLetter();
        $this->assertTrue(ctype_upper($this->ng->name[0]));
    }

    public function testSetName(){
        $this->ng->setName('Test');
        $this->assertEquals('Test', $this->ng->name);
    }

    public function testAddAlias(){
        $this->ng->setName($this->ng->generateName());
        $this->ng->addAlias();
        $this->assertRegexp('/a.k.a/', $this->ng->name);
    }

    public function testException()
    {
        $this->expectException(NotANumberException::class);
        $this->ng->setLength('x');
    }

    public function testFail()
    {
        $this->assertTrue($this->ng->fail->fails());
    }


    public function addDataProvider()
    {
        return [
            [10],
            [20],
            [30],
        ];
    }





}