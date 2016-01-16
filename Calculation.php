<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './NullParameterException.php';

/**
 * Description of Calculation
 *
 * @author nguyentienthanh
 */
class Calculation {
    //put your code here
    private $memory;
    
    function __construct() {
        $this->memory = 0;
    }
            
    function add($a, $b) {
        if (!isset($a) || !isset($b)) {
            throw new NullParameterException();
        }
        return $a+$b;
    }
    
    function addToMemory($a) {
        $this->memory += $a;
        return $this->memory;
    }
    
    function resetMemory() {
        $this->memory = 0;
    }
}
