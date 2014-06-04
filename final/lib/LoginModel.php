<?php

/*
 * Class for the login model
 * 
 * @author Josh Keyes
 */


class LoginModel {
    
    
    
    private $email;
    public function getEmail() {
        return $this->email;
    }
    
    private $password;
    public function getPassword() {
        return $this->password;
    }
    
    
    private $user_id;
    public function getUser_id() {
        return $this->user_id;
    }
  
    public $errors = array();
    
    
    function __construct($paramArr) {        
        $this->map($paramArr);
        
    }
    
    public function map($paramArr) {
        
        if ( ! is_array($paramArr) ) {
            return false;
        }
        
         if ( array_key_exists('user_id', $paramArr) ) {
            $this->setUser_id($paramArr['user_id']);
        }
        
       
        if ( array_key_exists('email', $paramArr) ) {
            $this->setEmail($paramArr['email']);
        }
       
        if ( array_key_exists('password', $paramArr) ) {
            $this->setPassword($paramArr['password']);
        }
       
       
        
        
    }
   
    
    
    

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
   
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    
   




    
}
