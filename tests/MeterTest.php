<?php


use TripleI\taxi\Meter;

class MeterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @group meter-test1
     **/
    public function test1 ()
    {
        $meter = new Meter();

        $meter->add('AD');
        $this->assertEquals($meter->payoff(), 400);

        $meter->add('DF');
        $this->assertEquals($meter->payoff(), 450);

        $meter->add('FC');
        $this->assertEquals($meter->payoff(), 510);
    }


}

