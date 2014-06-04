<?php



/**
 * Class for the admin page
 *
 * @author Josh
 */
class Admin extends DB{
    
    function __construct() {
        $this->setDb();
    }
    
    /*
     * Public function to create a new SQL entry into the about_page table from the AdminDefault Model
     * 
     * @return type bool
     */
    public function create(AdminDefault $AdminDefault) {
         $result = false;
         $email = $AdminDefault->getEmail();
         $user_id = $AdminDefault->getUser_id();
         $title = $AdminDefault->getTitle();
         $theme= $AdminDefault->getTheme();
         $address = $AdminDefault->getAddress();
         $phone = $AdminDefault->getPhone();
         $content = $AdminDefault->getContent();
         
        
         if ( null !== $this->getDB() && $AdminDefault instanceof AdminDefault) {
            $dbs = $this->getDB()->prepare('insert into about_page set user_id = :user_id, title = :title, theme = :theme, address = :address, phone = :phone, email = :email, content = :content');
            $dbs->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $dbs->bindParam(':title', $title, PDO::PARAM_STR);
            $dbs->bindParam(':theme', $theme, PDO::PARAM_STR);
            $dbs->bindParam(':address', $address, PDO::PARAM_STR);
            $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
            $dbs->bindParam(':email', $email, PDO::PARAM_STR);
            $dbs->bindParam(':content', $content, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = true;
                }
            else{
                $error = $dbs->errorInfo();
                error_log($error[2], 3, "logs/errors.log");
            }
        }   
        
        return $result;
    }
    
    /*
     * Public function to update a SQL entry in the about_page table
     * 
     * @return type bool
     */
    public function update($AdminModel) {
        $result = false;
        $email = $AdminModel->getEmail();
         $user_id = $AdminModel->getUser_id();
         $title = $AdminModel->getTitle();
         $theme= $AdminModel->getTheme();
         $address = $AdminModel->getAddress();
         $phone = $AdminModel->getPhone();
         $content = $AdminModel->getContent();
        
        
         if ( null !== $this->getDB() && $AdminModel instanceof AdminModel) {
            $dbs = $this->getDB()->prepare('update about_page set title = :title, theme = :theme, address = :address, phone = :phone, email = :email, content = :content where user_id = :user_id');
            $dbs->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $dbs->bindParam(':title', $title, PDO::PARAM_STR);
            $dbs->bindParam(':theme', $theme, PDO::PARAM_STR);
            $dbs->bindParam(':address', $address, PDO::PARAM_STR);
            $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
            $dbs->bindParam(':email', $email, PDO::PARAM_STR);
            $dbs->bindParam(':content', $content, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = true;
                
            }
            else{
                $error = $dbs->errorInfo();
                error_log($error[2], 3, "logs/errors.log");
            }
        
         }   
        
        return $result;
    }
    
    /*
     * Public function to read passed in $user_id variable and calls either read by single ID or read by all IDs function
     * 
     * @return type function
     */
    public function read($user_id = 0) {
       if ($user_id !== 0) {
           return $this->readByID($user_id);
       } else {
           return $this->readAll();
       }
        
    }
    
    /*
     * Private function to prepare a select all to view a single user id's results from the about_page
     * 
     * @return type array
     */
    private function readByID($user_id){
           $results = array();
           
            if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select * from about_page where user_id = :user_id limit 1');
            $dbs->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetch(PDO::FETCH_ASSOC);
            }
        
         }   
           
           return $results;
     }
    /*
     * Private function to prepare a select all to view all entries from the about_page
     * 
     * @return type array
     */
    private function readAll(){
         $results = array();
        
         if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select * from about_page');
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
            }
        
         }        
        return $results;
    }
    
    /*
     * Function to create array of available themes
     * 
     * @return type array
     */
    public function getThemes(){
        return array('theme1'=>"Theme 1",  
			'theme2'=>"Theme 2",  
			'theme3'=>"Theme 3"  
			);
    }
    
    
}
