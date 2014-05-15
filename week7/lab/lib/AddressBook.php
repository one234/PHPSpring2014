<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * AddressBook Class
 * 
 */
class AddressBook extends DB {
    
    
    
    function __construct() {
        $this->setDb();
    }
    
    /**
    * A public method to create a new entry into the addressbook
    * database.
    * Params are bound to their respective AddressBookModel variables
    *
    * @param object $AddressbookModel must be an instanceof AddressbookModel
    *
    * @return boolean
    */  
    public function create($AddressbookModel) {
         $result = false;
        
        
         if ( null !== $this->getDB() && $AddressbookModel instanceof AddressbookModel) {
            $dbs = $this->getDB()->prepare('insert into addressbook set address = :address, city = :city, state = :state, zip = :zip, name = :name');
            $dbs->bindParam(':address', $AddressbookModel->address, PDO::PARAM_STR);
            $dbs->bindParam(':city', $AddressbookModel->city, PDO::PARAM_STR);
            $dbs->bindParam(':state', $AddressbookModel->state, PDO::PARAM_STR);
            $dbs->bindParam(':zip', $AddressbookModel->zip, PDO::PARAM_STR);
            $dbs->bindParam(':name', $AddressbookModel->name, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = true;
            }
        
         }   
        
        return $result;
    }
    /**
     * Public method to update addressbook database.
     * Params are bound to their respective AddressBookModel variables
     * 
     * @param AddressbookModel $AddressbookModel
     * @return boolean
     */
    public function update($AddressbookModel) {
        $result = false;
        
        
         if ( null !== $this->getDB() && $AddressbookModel instanceof AddressbookModel) {
            $dbs = $this->getDB()->prepare('update addressbook set address = :address, city = :city, state = :state, zip = :zip, name = :name where id = :id');
            $dbs->bindParam(':id', $AddressbookModel->id, PDO::PARAM_INT);
            $dbs->bindParam(':address', $AddressbookModel->address, PDO::PARAM_STR);
            $dbs->bindParam(':city', $AddressbookModel->city, PDO::PARAM_STR);
            $dbs->bindParam(':state', $AddressbookModel->state, PDO::PARAM_STR);
            $dbs->bindParam(':zip', $AddressbookModel->zip, PDO::PARAM_STR);
            $dbs->bindParam(':name', $AddressbookModel->name, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = true;
            }
        
         }   
        
        return $result;
    }
    /**
     * Public method that if a single id is selected the readByID method is called
     * If no id is selected the readAll method is called and all rows are returned
     * 
     * @param type $id
     * @return type
     */
    public function read($id = 0) {
       if ($id !== 0) {
           return $this->readByID($id);
       } else {
           return $this->readAll();
       }
        
    }
    /**
     * Private method to prepare SQL statement to view single addressbook entry by selected id
     * 
     * @param type $id
     * @return type array
     */
     private function readByID($id){
           $results = array();
           
            if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select * from addressbook where id = :id limit 1');
            $dbs->bindParam(':id', $id, PDO::PARAM_INT);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetch(PDO::FETCH_ASSOC);
            }
        
         }   
           
           return $results;
     }
    /**
     * Private function to prepare SQL select all statement to view all addressbook entries
     * 
     * @return type array
     */
    private function readAll(){
         $results = array();
        
         if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select * from addressbook');
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
            }
        
         }        
        return $results;
    }


    /**
     * Public function that will delete an entry from the database
     */

    public function delete() {
        
    }
    /**
     * Public function that returns an array of all 50 states
     * 
     * @return type array
     */
    public function getStates(){
        return array('AL'=>"Alabama",  
			'AK'=>"Alaska",  
			'AZ'=>"Arizona",  
			'AR'=>"Arkansas",  
			'CA'=>"California",  
			'CO'=>"Colorado",  
			'CT'=>"Connecticut",  
			'DE'=>"Delaware",  
			'DC'=>"District Of Columbia",  
			'FL'=>"Florida",  
			'GA'=>"Georgia",  
			'HI'=>"Hawaii",  
			'ID'=>"Idaho",  
			'IL'=>"Illinois",  
			'IN'=>"Indiana",  
			'IA'=>"Iowa",  
			'KS'=>"Kansas",  
			'KY'=>"Kentucky",  
			'LA'=>"Louisiana",  
			'ME'=>"Maine",  
			'MD'=>"Maryland",  
			'MA'=>"Massachusetts",  
			'MI'=>"Michigan",  
			'MN'=>"Minnesota",  
			'MS'=>"Mississippi",  
			'MO'=>"Missouri",  
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio",  
			'OK'=>"Oklahoma",  
			'OR'=>"Oregon",  
			'PA'=>"Pennsylvania",  
			'RI'=>"Rhode Island",  
			'SC'=>"South Carolina",  
			'SD'=>"South Dakota",
			'TN'=>"Tennessee",  
			'TX'=>"Texas",  
			'UT'=>"Utah",  
			'VT'=>"Vermont",  
			'VA'=>"Virginia",  
			'WA'=>"Washington",  
			'WV'=>"West Virginia",  
			'WI'=>"Wisconsin",  
			'WY'=>"Wyoming");
    }
}