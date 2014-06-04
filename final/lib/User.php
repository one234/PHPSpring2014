<?php



/**
 * User Class
 * 
 * @author Josh Keyes
 */
class User extends DB {
    
    /*
     * Constructor for setDB
     * 
     * @return type void
     */
    
    function __construct() {
        $this->setDb();
        
    }
    
    /*
     * Function to create a SQL entry into the users table and return their user id
     * 
     * @return type int
     */
    public function create(UserModel $UserModel) {
         $result = false;
         $website = $UserModel->getWebsite();
         $email = $UserModel->getEmail();
         $password = sha1($UserModel->getPassword());
         
        
         if ( null !== $this->getDB() && $UserModel instanceof UserModel) {
            $dbs = $this->getDB()->prepare('insert into users set website = :website, email = :email, password = :password');
            $dbs->bindParam(':website', $website, PDO::PARAM_STR);
            $dbs->bindParam(':email', $email, PDO::PARAM_STR);
            $dbs->bindParam(':password',$password, PDO::PARAM_STR);
            
            
           
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = intval($this->getDB()->lastInsertId());
            } else {
                $error = $dbs->errorInfo();
                error_log($error[2], 3, "logs/errors.log");
            }
        
         }   
        
        return $result;
    }
    
    /*
     * Public function to prepare a SQL statement to check if there's a match to the passed in $website variable
     * 
     * @return bool
     */
   public function websiteTaken( UserModel $UserModel ) {
       
        $website = $UserModel->getWebsite();
        $isTaken = false;
        
        
         if ( null !== $this->getDB() ) {
             
            $dbs = $this->getDB()->prepare('select website from users where website = :website limit 1');
                     
            
            $dbs->bindParam(':website', $website, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() === 0 ) {
                $isTaken = true;
            }
        
         }   
        
      return $isTaken;  
    }
    
    /*
     * Public function to read passed in $user_id and return website where webite matches entry for user_id
     * 
     * @return type array
     */
    public function readByID($user_id){
           $results = "";
           
           
            if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select website from users where user_id = :user_id limit 1');
            $dbs->bindParam(':user_id', $user_id, PDO::PARAM_INT);
 
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetch(PDO::FETCH_ASSOC);
            }
        
         }   
           
           return $results;
     }
     
     /*
     * Public function to read passed in $website variable and calls either read by read by a single website or read by all websites function
     * 
     * @return type function
     */
    
    public function readWebsite($website = "") {
       if ($website !== "") {
           return $this->readByWebsite($website);
       } else {
           return $this->readAllWebsites();
       }
        
    }
     
     /**
     * Private function to prepare SQL select single statement to view about_page entry matching passed in website
     * 
     * @return type array
     */
     private function readByWebsite($website){
           $results = array();
           
            if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select user_id from users where website = :website limit 1');
            $dbs->bindParam(':website', $website, PDO::PARAM_INT);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetch(PDO::FETCH_ASSOC);
            }
        
         }   
           
           return $results;
     }
    /**
     * Private function to prepare SQL select all statement to view all about_page entries
     * 
     * @return type array
     */
    
    private function readAllWebsites(){
         $results = array();
        
         if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select * from users');
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
            }
        
         }        
        return $results;
    }
   
    
}