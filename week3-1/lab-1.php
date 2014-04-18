<!DOCTYPE html>
<!--
Using PHP try to see how you would solve the issue of putting an error class
into each input.  I created the class for you, and the solution is solved
but in the refactoring phase there has to be a better way.  Also make sure
to populate the post values back into the field. 

Goals:
1.  Re-populate post values into the input fields.
2.  Put the "inputerror" class into the input form fields if 
    they are not populated on a post.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .error {
                border: 1px solid red;
                padding: 0.2em;
                color: red;
            }
            
            .inputerror {border: 1px solid red;}
        </style>
    </head>
    <body>
        <?php
        // put your code here
        
            if ( !empty($_POST)) {
                
                $errorMessages = array(
                  "email" => 'email is invalid',  
                  "username" => 'username is not found',  
                  "password" => 'password does not work',  
                );
                
                $email = filter_input(INPUT_POST, 'email');
                $username = filter_input(INPUT_POST, 'username');
                $password = filter_input(INPUT_POST, 'password');
                
                    
                if (!empty($email)) {
                    $errorMessages['email'] = '';
                    $err1 = "";
                } else {
                    $err1 = "inputerror" ;
                }
                if (!empty($username)) {
                    $errorMessages['username'] = '';
                    $err2 = "";
                } else {
                    $err2 = "inputerror";
                }
                if (!empty($password)) {
                    $errorMessages['password'] = '';
                    $err3 = "";
                } else {
                    $err3 = "inputerror";
                }
            
             }
             
                $email = filter_input(INPUT_POST, 'email');
                $username = filter_input(INPUT_POST, 'username');
                $password = filter_input(INPUT_POST, 'password');
        ?>
        
        
        <h2> My Form Demo </h2>
       <form name="mainform" action="#" method="post">            
           Email: <input type="text" class ="<?php echo $err1; ?>" name="email" value ="<?php echo $email; ?>" /> <br /> 
            <?php 
            if ( !empty($errorMessages["email"]) ) 
                echo '<p class="error">',$errorMessages["email"], '</p>';
            ?>
            Username: <input type="text" class ="<?php echo $err2; ?>" name="username" value ="<?php echo $username; ?>" /> <br /> 
            <?php 
            if ( !empty($errorMessages["username"]) )
                echo '<p class="error">',$errorMessages["username"], '</p>';                
            ?>           
            Password: <input type="password" class ="<?php echo $err3; ?>" name="password"  /> <br />
            <?php 
            if ( !empty($errorMessages["password"]) )
                echo '<p class="error">',$errorMessages["password"], '</p>';                
            ?>
            <br />
            <input type="submit" value="Submit" />                        
        </form>
    </body>
</html>
