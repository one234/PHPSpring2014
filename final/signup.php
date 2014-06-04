<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<!--
Author - Josh Keyes
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Josh's Final</title>
         <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
                
        
        <h1 id="logo"><span>&#x2728;</span>Josh's PHP Final</h1>
        
        
        <?php
      
         $user = new User();
         $newAdmin = new Admin();
         $errors = array();
         $UserModel = new UserModel(filter_input_array(INPUT_POST));
         
         if ( Util::isPostRequest() ) {
              
              
             if ( $UserModel->entryIsValid()) { 
                 
                 if ($user->websiteTaken($UserModel)){
                     
                          echo "Website Not Taken!!!!!";
                          
                  $id = $user->create($UserModel);
                  
                  if ($id > -1){
                      
                      echo $id;
                      echo "user added!";
                      
                      $newUser = array(
                          "user_id" => $id,
                          "title" => "enter your title",
                          "theme" => "theme1",
                          "address" => "enter your address",
                          "phone" => "phone",
                          "email" => filter_input(INPUT_POST, 'email'),
                          "content" => "This is the about us area. Multiple lines are allowed. Your entry will be displayed on your webpage"
                          );
                      
                      $AdminDefault = new AdminDefault($newUser);
                      
                      if ($newAdmin->create($AdminDefault)){
                          header("Location: login.php");
                      }
                      
                      else{
                          
                          echo '<ul class="error">';
                          echo '<li>Unknown System Error</li>';
                          echo '</ul>';
                          
                      }
                      
                  }
                  
                  
                  else{
                          echo '<ul class="error">';
                          echo '<li>Unknown System Error</li>';
                          echo '</ul>';
                          
                  }
                  
                 }
                 
                 else{
                     
                      echo '<ul class="error">';
                      echo '<li>Website Taken</li>';
                      echo '</ul>';
                      
                  }
                 }
                 
                else {
                    
                    $errors = $UserModel->getErrors();
                }
                
                if ( count($errors) ) {
                    
                echo '<ul class="error">';
                foreach ($errors as $value) {
                    echo '<li>',$value,'</li>';
                    
                }
                echo '</ul>'; 
            }
            
          }
         
         
         
         
         
         
       
          
          
        
        ?>
        
        <fieldset>
            <legend>Sign-up</legend>
        <p> Already a member, <a href="login.php">Login</a></p>
         <form name="mainform" action="#" method="post">
            
             
                         <label>Web Site:</label> <input type="text" name="website" maxlength="30" value="<?php echo $UserModel->getWebsite(); ?>" /> <br />
                         
            
                          <label>Email:</label> <input type="text" name="email" value="<?php echo $UserModel->getEmail(); ?>"/> <br />
                          
            
                          <label>Password:</label> <input type="password" name="password" /> <br />
                          
               
            <input type="submit" value="Submit" />
                        
        </form>
        </fieldset>
    </body>
</html>