<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<!--
Author - Josh Keyes
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Josh's Final - Admin</title>
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
                 
        <h1 id="logo"><span>&#x2728;</span>Josh's PHP Final</h1>
        
        <div id="corner"><a href="?logout=1">Logout</a></div>
        <?php
        
        
        include 'logout.php';
        
        logout::checkLogout();
        logout::confirmAccess();
        
        $user_id =  $_SESSION['user_id'];
        $admin = new Admin();
        $user = new User();
        $errors = array();
        $website = $user->readByID($user_id);
        
        
        if ( Util::isPostRequest() ) {
             
              $AdminModel = new AdminModel(filter_input_array(INPUT_POST));
              
              if ( $AdminModel->entryIsValid() ) { 
                  
              if ( $admin->update($AdminModel) ) {
                  
                  echo '<ul class="error">';
                  echo '<li>User Updated</li>';
                  echo '</ul>';
                  
              } 
              
              else {
                  
                   echo '<ul class="error">';
                   echo '<li>User not upated. Please check that new information was entered</li>';
                   echo '</ul>';
              }
              
              }
              
              else {
                  
                $errors = $AdminModel->getErrors();
                
              }
              
                if ( count($errors) ) {
                    
                echo '<ul class="error">';
                foreach ($errors as $value) {
                echo '<li>',$value,'</li>';
                
                }
                
                echo '</ul>'; 
            }
          }
        
          $adminResult = $admin->read($user_id);
          
        ?>
        
        
         <fieldset>
        
        <legend> Edit your Page</legend>
                
        
        <div id="preview"> <a href="index.php?website=<?php echo $website['website']; ?>" target="popup">View Page</a></div>
        
        
         <form name="mainform" action="#" method="post">
            
             <label> Title:</label> <input type="text" name="title" value="<?php echo $adminResult['title']; ?>" /><br />            
             <label> Theme:</label> <?php
                
                

                echo'<select name="theme">';

                $theme_list = $admin->getThemes();

                foreach($theme_list as $key => $value){
                 
                    if($adminResult['theme'] === $key){
                        echo'<option selected="selected" value="'.$key.'">'.$value.'</option>';
                    }
                    
                    else{
                        echo'<option value="'.$key.'">'.$value.'</option>';
                    }
                }
                
                echo'</select>';
                    
                
               
                ?>
            <br />
            
            <label> Address:</label> <input type="text" name="address" value="<?php echo $adminResult['address']; ?>" /><br /> 
            <label> Phone:</label> <input type="text" name="phone" value="<?php echo $adminResult['phone']; ?>" /><br />
           
            <label> Email:</label> <input type="text" name="email" value="<?php echo $adminResult['email']; ?>" /><br />
            <input type="hidden" name="user_id" value="<?php echo $adminResult['user_id']; ?>" />
             
        
        
        
            <label> About:</label><br />
            <textarea name="content" id="content" cols="50" rows="10"><?php echo $adminResult['content']; ?></textarea><br /> 
            
            <input type="submit" value="Submit" />
            
        </form>
        
         </fieldset>
        
    </body>
</html>
