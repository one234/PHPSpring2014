<?php



/**
 * Model to Handle Input For the admin page / Admin class
 *
 * Author - Josh Keyes
 */
class AdminModel {
    
    private $user_id;
    public function getUser_id() {
        return $this->user_id;
    }
    
    public function setUser_id() {
        $user_id = $this->getUser_id();
    }

        
    private $title;
    public function getTitle() {
    return $this->title;
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
    
    
    public $errors = array();
    
    /*
     * Constructor for all variables
     * 
     * @return type void
     */
    function __construct() {        
        $this->user_id = filter_input(INPUT_POST, 'user_id');      
        $this->title =  filter_input(INPUT_POST, 'title');
        $this->theme = filter_input(INPUT_POST, 'theme');
        $this->address =  filter_input(INPUT_POST, 'address');      
        $this->phone = filter_input(INPUT_POST, 'phone');
        $this->email = filter_input(INPUT_POST, 'email');
        $this->content = filter_input(INPUT_POST, 'content');
        
        
    }
    
    
    
    public function setTitle() {
        $title = $this->getTitle();
        
        if ( empty($title) ) {
            $this->errors["title"] = "Title is missing.";
            } else if ( !Validator::titleIsValid($this->getTitle()) ) {
            $this->errors["title"] = "Title is not valid. Please make sure the title is less than 20 characters";                
            }
        
        return ( empty($this->errors["title"]) ? true : false ) ;
    }
     
    

    public function setTheme($theme) {
        $this->theme = $theme;
    }

     
    public function setAddress() {
        $address = $this->getAddress();
        
        if ( empty($address) ) {
            $this->errors["address"] = "Address is missing.";
            } else if ( !Validator::addressIsValid($this->getAddress()) ) {
            $this->errors["address"] = "Address is not valid.";                
            }
        
        return ( empty($this->errors["address"]) ? true : false ) ;
    }
    
     
    public function setPhone() {
        $phone = $this->getPhone();
        
        if ( empty($phone) ) {
            $this->errors["phone"] = "Phone is missing.";
            } else if ( !Validator::phoneIsValid($this->getPhone()) ) {
            $this->errors["phone"] = "Phone number is not valid. Please make sure number is in 10 digit ########## format ";                
            }
        
        return ( empty($this->errors["email"]) ? true : false ) ;
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

     
    public function setContent() {
        $content = $this->getContent();
        
        if ( empty($content) ) {
            $this->errors["content"] = "Content is missing.";
            } else if ( !Validator::emailIsValid($this->getEmail()) ) {
            $this->errors["content"] = "Content is not valid.";                
            }
        
        return ( empty($this->errors["email"]) ? true : false ) ;
    }
    
     
    public function getErrors() {
        return $this->errors;
    }
    
    
      /*
     * Entry is valid function to check is all entries are valid
     * 
     * @return type bool
     * 
     */
    public function entryIsValid(){
        
        $this->setEmail();
        $this->setTitle();
        $this->setAddress();
        $this->setContent();
        $this->setPhone();
        $this->setUser_id();
        
        
        
        
        return ( count($this->errors) ? false : true );
    }
    

}
