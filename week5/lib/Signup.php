<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Signup
 *
 * @author GFORTI
 */
class Signup {
  
    
    
    private $name;
    private $comments;
    
   
    private $errors = array();
            
    function __construct() {
       
        $this->name = filter_input(INPUT_POST, 'name');      
        $this->comments = filter_input(INPUT_POST, 'comments');
        
    }

    
    
    public function getName() {
        return $this->name;
    }

    public function getComments() {
        return $this->comments;
    }

    
    
   /**
    * A method to return all errors found in the post
    *
    * @return array
    */  
    public function getErrors() {
        return $this->errors;
    }
    
    
    
 
    
    /**
    * A method to check if a posted username is valid.
    * Adds a custom message to the errors list key["username"]
    *
    * @return boolean
    */    
    public function nameEntryIsValid() {
        
         $name = $this->getName();
         
         if ( empty($name) ) {
            $this->errors["name"] = "Name is missing.";
         } else if ( !Validator::nameIsValid($this->getName()) ) {
            $this->errors["name"] = "Name is not valid. Please make sure name is greater than 2 characters";                
         }
        
        return ( empty($this->errors["name"]) ? true : false ) ;
    }
    
    /**
    * A method to check if a posted comments is valid.
    * Adds a custom message to the errors list key["comments"]
    *
    * @return boolean
    */    
    public function commentsEntryIsValid() {
        
         $comments = $this->getComments();
         
         if ( empty($comments) ) {
            $this->errors["comments"] = "Comments are missing.";
         } else if ( !Validator::nameIsValid($this->getComments()) ) {
            $this->errors["comments"] = "Please enter at least 3 characters in the comments section.";                
         }
        
        return ( empty($this->errors["comments"]) ? true : false ) ;
    }
    
 
    
    
    /**
    * A static method to check if a Post request has been made.
    *    
    * @return boolean
    */    
    public function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    
    
    
    public function entryIsValid(){
        $this->nameEntryIsValid();
        $this->commentsEntryIsValid();
        
        
        return ( count($this->errors) ? false : true );
    }
    
}
