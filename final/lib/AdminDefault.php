<?php



/**
 * Model to create a default entry into the about_page table after a new user creates an acount from the signup page
 *
 * @author Josh
 */
class AdminDefault {
    private $user_id;
    public function getUser_id() {
        return $this->user_id;
    }
    
    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

        
    private $title;
    public function getTitle() {
    return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

        
    private $theme;
    public function getTheme() {
        return $this->theme;
    }

    
    private $address;
    public function getAddress() {
        return $this->address;
    }
    
    
    private $phone;
    public function getPhone() {
        return $this->phone;
    }
    
    private $email;
     public function getEmail() {
        return $this->email;
    }

    private $content;
    public function getContent() {
        return $this->content;
    }
    
    
    
    
    
    function __construct($paramArr) {        
        $this->map($paramArr);
        
    }
    
    /**
    * A public method to map all the variables to a value
    *
    * @param Array $paramArr
    *
    * @return Void
     */
    public function map($paramArr) {
        
        if ( ! is_array($paramArr) ) {
            return false;
        }
        
         if ( array_key_exists('user_id', $paramArr) ) {
            $this->setUser_id($paramArr['user_id']);
        }
        
        
        if ( array_key_exists('title', $paramArr) ) {
            $this->setTitle($paramArr['title']);
        }
        if ( array_key_exists('theme', $paramArr) ) {
            $this->setTheme($paramArr['theme']);
        }
        if ( array_key_exists('address', $paramArr) ) {
            $this->setAddress($paramArr['address']);
        }
       
        if ( array_key_exists('phone', $paramArr) ) {
            $this->setPhone($paramArr['phone']);
        }
       
        if ( array_key_exists('email', $paramArr) ) {
            $this->setEmail($paramArr['email']);
        }
       
        if ( array_key_exists('content', $paramArr) ) {
            $this->setContent($paramArr['content']);
        }
       
       
        
        
    }
    public function setTheme($theme) {
        $this->theme = $theme;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContent($content) {
        $this->content = $content;
    }


    
}
