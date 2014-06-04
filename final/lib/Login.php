<?php



/**
 * Login Class
 *
 * @author Josh Keyes
 */
class Login extends DB {
    
    
    
    /*
     * Constructor for variables and setDb function
     * 
     * @return type void
     */
    
    function __construct() {
        $this->setDb();
        $this->email = filter_input(INPUT_POST, 'email');      
        $this->password = filter_input(INPUT_POST, 'password');
        
    }
    
    /*
     * Function to check user inputted password and email for a match in the users table
     * 
     * @return type bool
     */
    
    public function authenticate(LoginModel $LoginModel) {
         $result = false;
         $email = $LoginModel->getEmail();
         $password = sha1($LoginModel->getPassword());
        
         if ( null !== $this->getDB() && $LoginModel instanceof LoginModel) {
            $dbs = $this->getDB()->prepare('SELECT user_id FROM users WHERE email = :email AND password = :password');
            $dbs->bindParam(':email', $email, PDO::PARAM_STR);
            $dbs->bindParam(':password', $password, PDO::PARAM_STR);
            
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = $dbs->fetch();
            }
            else {
                $error = $dbs->errorInfo();
                error_log($error[2], 3, "logs/errors.log");
            }
            
         }   
        
        return $result;
    }
    
   

}
