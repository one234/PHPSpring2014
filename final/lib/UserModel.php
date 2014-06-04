<?php
/*
 * Model for the User class
 * 
 * @author Josh Keyes
 */



class UserModel {
    
    
    private $website;
    public function getWebsite() {
        return $this->website;
    }
    
    private $email;
    public function getEmail() {
        return $this->email;
    }
    
    
    private $password;
    public function getPassword() {
        return $this->password;
    }
    
    
    public $errors = array();
    
    
    function __construct() {
       
        $this->email = filter_input(INPUT_POST, 'email');      
        $this->website = filter_input(INPUT_POST, 'website');
        $this->password = filter_input(INPUT_POST, 'password');
        
    }
    
    
    public function setWebsite() {
            
            $website= $this->getWebsite();
            
            if ( empty($website) ) {
            $this->errors["website"] = "Website is missing.";
            } else if ( !Validator::websiteIsValid($this->getWebsite()) ) {
            $this->errors["website"] = "Website is not valid. Please make sure to start with www and only use alpha characters";                
            }
        
        return ( empty($this->errors["website"]) ? true : false ) ;
        
    }
    

    public function setEmail() {
        $email = $this->getEmail();
        
        if ( empty($email) ) {
            $this->errors["email"] = "E-mail is missing.";
            } else if ( !Validator::emailIsValid($this->getEmail()) ) {
            $this->errors["email"] = "E-mail is not valid.";                
            }
        
        return ( empty($this->errors["email"]) ? true : false ) ;
    }
    
    

    public function setPassword() {
        $password = $this->getPassword();
        
       if ( empty($password) ) {
            $this->errors["password"] = "Password is missing.";
            } else if ( !Validator::passwordIsValid($this->getPassword()) ) {
            $this->errors["password"] = "Password is not valid. Please make sure password is 6 or more characters";                
            }
        
        return ( empty($this->errors["password"]) ? true : false ) ;
    }
    
    
    
    public function getErrors() {
        return $this->errors;
    }
    
    
    /*
     * Public function to check is all entries are valid
     * 
     * @return type bool
     */
    public function entryIsValid(){
        $this->setWebsite();
        $this->setEmail();
        $this->setPassword();
        
        
        return ( count($this->errors) ? false : true );
    }
    




    
}
