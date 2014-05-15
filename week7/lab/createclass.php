<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        Util::confirmAccess();
      
        
         $address = new AddressBook();
         
         
         if ( Util::isPostRequest() ) {
              
              $AddressbookModel = new AddressbookModel($_POST);
              
              if ( $address->create($AddressbookModel) ) {
                  echo '<p>Address updated</p>';
              } else {
                   echo '<p>Address Could not update</p>';
              }
          }
         
         
         
         
         
         
       
          
          
        ?>
        
        <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Create:</legend>
                <label for="name">Name:</label> 
                <input id="name" type="text" name="name" value="" /> <br />
               
                <label for="address">Address:</label> 
                <input id="address" type="text" name="address" value="" /> <br />
               
                <label for="city">City:</label> 
                <input id="city" type="text" name="city" value="" /> <br />
               
                <label for="state">State:</label> 
                <?php
                
                

                echo'<select name="state">';

                $state_list = $address->getStates();

                foreach($state_list as $key => $value){
                 
                    
                        echo'<option value="'.$key.'">'.$value.'</option>';
                    
                }
                
                echo'</select>';
                    
                
               
                ?>
                
               
                              
                <label for="zip">ZIP:</label> 
                <input id="zip" type="text" name="zip" value="" /> <br />
               
                
                
                <input type="submit" value="Submit" />
            </fieldset>
        </form>
        
        
    </body>
</html>
