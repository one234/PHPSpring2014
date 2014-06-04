<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<!--
Author - Josh Keyes
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Josh's Final Login</title>
         <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
                
        <h1 id="logo"><span>&#x2728;</span>Josh's PHP Final</h1>
        
        <?php
        
            $login = new Login();
           
            $LoginModel = new LoginModel(filter_input_array(INPUT_POST));
            
              if ( Util::isPostRequest() ) {
                  
              if ( $login->authenticate($LoginModel) ) {
                  
                   echo '<p>Loged In!</p>';
                   $user_id = $login->authenticate($LoginModel);
                   $_SESSION['user_id']=$user_id[0];
                   $_SESSION['login'] = true;
                   header("Location: admin.php");
                  
              } 
              
              else {
                  
                  echo '<ul class="error">';
                  echo '<li>User could not be logged in. Please confirm correct E-mail and Password</li></ul>';
              }
             
          }
   
        ?>
        
        <fieldset>
            
            <legend>Login</legend>
            
            <p> Not a member, <a href="signup.php">Sign-up</a></p>

                        
            <form name="mainform" action="#" method="post">

                          <label>Email:</label> <input type="text" name="email" value="<?php echo $LoginModel->getEmail(); ?>" /> <br />
                          
            
                          <label>Password:</label> <input type="password" name="password" /> <br />
                          

                <input type="submit" value="Submit" />

            </form>
        </fieldset>
    </body>
</html>
