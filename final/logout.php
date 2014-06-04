<?php



/**
 * Contains functions to handle login and logout sessions
 *
 * @author Josh Keyes
 */
class logout {
    
    
    /*
     * Public static function to handle logout session
     * 
     */
    public static function checkLogout() {
        
        $logout = filter_input(INPUT_GET, 'logout');
        
        echo $logout;
        
        if ( $logout == 1 ) {
            $_SESSION['login'] = false;
            session_destroy();
        }
        
    }
    
    /*
     * Public static function to handle login session
     * 
     */
    public static function confirmAccess() {
        if ( $_SESSION['login'] !== true ) {
             header("location: login.php");           
        }
    }
    
    
}
