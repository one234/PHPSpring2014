<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validator
 *
 * @author GFORTI
 */
class Validator {
   
    
    
     /**
    * A static method to check if a name is valid.
    *
    * @param string $name must be a valid name
    *
    * @return boolean
    */    
    public static function nameIsValid($name) {
        return ( is_string($name) && !empty($name) && strlen($name) >=2 );       
    }
    
     /**
    * A static method to check if the comments sections is.
    *
    * @param string $comments must be a valid
    *
    * @return boolean
    */    
    public static function commentsIsValid($comments) {
        return ( is_string($comments) && !empty($comments) && strlen($comments) >=3 );       
    }
    
    
}
