<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './InsufficientBalanceException.php';
//include './User.php';
/**
 * Description of BankAccount
 *
 * @author nguyentienthanh
 */
class BankAccount {
    //put your code here
    private $balance;
    private $id;
    private $user;
    
    public function __construct($id,$user) {
        $this->balance = 0;
        $this->id = $id;
        $this->user = $user;
    }
    
    public function getBalance() {
        return $this->balance;
    }
    
    public function deposit($money) {
        $this->balance += $money;
    }
    
    public function withdraw($money) {
        if ($this->balance >= $money) {
            $this->balance -= $money;
        }else {
            throw new InsufficientBalanceException();
        }
    }
    
    public function transfer($bank_account, $money) {
        try {
            $this->withdraw($money);
            $bank_account->deposit($money);
        } catch (InsufficientBalanceException $exc) {
            throw new InsufficientBalanceToTransferException();
        }
    }
}
