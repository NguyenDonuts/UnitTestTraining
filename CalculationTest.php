<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Calculation.php';
include_once 'NullParameterException.php';

/**
 * Description of CalculationTest
 *
 * @author nguyentienthanh
 */
class CalculationTest extends PHPUnit_Framework_TestCase
{
    private $calculator;
    
    public function setUp() {
        parent::setUp();
        $this->calculator = new Calculation();
    }
    
    public function tearDown() {
        
    }
    
    function addResultDataProvider() {
        return array(
            array(4,1,3),
            array(2,1,1),
        );
    }
    
    /** @dataProvider addResultDataProvider */
    function testAddResult($expected_result, $a, $b)
    {
        $this->assertEquals($expected_result, $this->calculator->add($a,$b));
    }
    
    function addExceptionDataProvider() {
        return array (
            array(NULL, 1),
            array(1, NULL),
            array(NULL, NULL)
        );
    }
    
    /** @dataProvider addExceptionDataProvider
     * @expectedException NullParameterException
     */
    function testAddException($a,$b) {
        $this->calculator->add($a, $b);
    }
    
    function addToMemoryDataProvider() {
        $data_provider_calculator = new Calculation();
        
        return array (
            array($data_provider_calculator,1,1),
            array($data_provider_calculator,3,2),
            array($data_provider_calculator,4,1)
        );
    }
    
    /** @dataProvider addToMemoryDataProvider */
    function testAddToMemory($data_provider_calculator,$expected_result,$a) {
        $this->assertEquals($expected_result, $data_provider_calculator->addToMemory($a));
    }
}
