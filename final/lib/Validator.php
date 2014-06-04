<?php


/**
 * Validator Class
 *
 * @author Josh Keyes
 */
class Validator {
    
        
   /**
  * A static method to check if an email is valid.
  *
  * @param string $email must be a valid email
  *
  * @return boolean
  */    
    public static function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) != false );
    }
    
    /**
    * A static method to check if an id is valid.
    *
    * @param string $id must be present
    *
    * @return boolean
    */ 
    
    public static function idIsValid($id) {
        return ( !empty($id));
    }
    
    
     /**
    * A static method to check if a website is valid.
    *
    * @param string $website must be a valid website
    *
    * @return boolean
    */    
    public static function websiteIsValid($website) {
        $reg_exp = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z\_\-\s\.\/\?\%\#\&\=]*)?$/";
        return ( is_string($website) && !empty($website) && preg_match($reg_exp, $website)); 
        
      
    }
    
    /**
    * A static method to check if a password is valid.
    *
    * @param string $password must be a valid password
    *
    * @return boolean
    */    
    public static function passwordIsValid($password) {
        
        return ( is_string($password) && (strlen($password) >= 6) && !empty($password) );
    }
    
    /**
    * A static method to check if a title is valid.
    *
    * @param string $title must be a valid title
    *
    * @return boolean
    */    
    public static function titleIsValid($title) {
        
        return ( is_string($title) && strlen($title) < 20 && !empty($title) );
    }
    
    /**
    * A static method to check if an address is valid.
    *
    * @param string $address must be a valid address
    *
    * @return boolean
    */    
    public static function addressIsValid($address) {
        
        return( is_string($address) && strlen($address) < 60 && !empty($address) );
    }
    
    /**
    * A static method to check if an phone is valid.
    *
    * @param string $phone must be a valid phone number
    *
    * @return boolean
    */ 
    public static function phoneIsValid($phone) {
        $regex =  "/^[0-9]/";
        return ( (preg_match($regex, $phone)) && strlen($phone) == 10 && !empty($phone) );
    }
    
    /**
    * A static method to check if content is valid.
    *
    * @param string $content must be valid content
    *
    * @return boolean
    */ 
    public static function contentIsValid($content) {
        
        return ( is_string($content) && (strlen($content) < 1000) && !empty($content) );
    }
}
