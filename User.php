<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './BankAccount.php';

/**
 * Description of User
 *
 * @author nguyentienthanh
 */
class User {
    /** @var BankAccount */
    private $bank_account;
    
    //inject $bank_account
    public function createBankAccount($bank_account,$money) {
        $this->bank_account = $bank_account;
        $this->deposit($money);
    }
    
    public function deposit($money) {
        $this->bank_account->deposit($money);
    }
    
    public function getTotalMoney() {
        return $this->bank_account->getBalance();
    }
}
