<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class for Passcode
 */
class Passcode {
    
    
    private $passcode;
    
    /**
     * Constructor to filter input from passcode post
     * 
     */
    function __construct() {
        $this->setPasscode(filter_input(INPUT_POST, 'passcode'));
    }
    
    /**
     * passcode getter
     * 
     * 
     */
    public function getPasscode() {
        return $this->passcode;
    }
    
    /**
     * passcode setter
     * 
     * @param type $passcode
     */
    public function setPasscode($passcode) {
        $this->passcode = $passcode;
    }
    
    /**
     * passcode validator
     * 
     * @return type bool
     */
    public function isValidPasscode(){
        // shortcut for if else checks to see if true (else) : false
        return ( $this->getPasscode() === Config::PASS_CODE ? true : false );
    }



}
