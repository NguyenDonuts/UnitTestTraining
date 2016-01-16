<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './BankAccount.php';

/**
 * Description of BankAccountTest
 *
 * @author nguyentienthanh
 */
class BankAccountTest extends PHPUnit_Framework_TestCase{
    //put your code here
    private $bank_account_1;
    private $bank_account_2;
    
    public function setUp() {
        $dummy_user_1 = new User();
        $dummy_user_2 = new User();
        $this->bank_account_1 = new BankAccount(1, $dummy_user_1);
        $this->bank_account_2 = new BankAccount(2, $dummy_user_2);
    }
    
    public function depositDataProvider() {
        $dummy_user = new User();
        $bank_account_stub = new BankAccount(0, $dummy_user);
        
        return array (
            array($bank_account_stub,10,10),
            array($bank_account_stub,20,30),
            array($bank_account_stub,10,40),
        );
    }
    
    /** @dataProvider depositDataProvider 
     * @param BankAccount $bank_account_stub
     */
    public function testDeposit($bank_account_stub,$money, $expected_balance) {
        $bank_account_stub->deposit($money);
        $this->assertEquals($expected_balance,$bank_account_stub->getBalance());
    }
    
    public function withdrawDataProvider() {
        $dummy_user = new User();
        $bank_account_stub = new BankAccount(0, $dummy_user);
        $bank_account_stub->deposit(30);
        
        return array (
            array($bank_account_stub,10,20),
            array($bank_account_stub,10,10),
            array($bank_account_stub,10,0),
        );
    }
    
    /** @dataProvider withdrawDataProvider 
     * @param BankAccount $bank_account_stub
     */
    public function testWithdraw($bank_account_stub,$money, $expected_balance) {
        $bank_account_stub->withdraw($money);
        $this->assertEquals($expected_balance,$bank_account_stub->getBalance());
    }
}
