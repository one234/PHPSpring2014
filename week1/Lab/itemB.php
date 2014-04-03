<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //array_count_values — Counts all the values of an array
        $array = array(1, "hello", 1, "world", "hello");
        print_r(array_count_values($array));
        
        
        /*array_flip — Exchanges all keys with 
        their associated values in an array*/
        $trans = array("a" => 1, "b" => 1, "c" => 2);
        $trans = array_flip($trans);
        print_r($trans);
        
        
        /*array_key_exists — 
        Checks if the given key or index exists in the array*/
        $search_array = array('first' => 1, 'second' => 4);
        if (array_key_exists('first', $search_array)) {
        echo "The 'first' element is in the array";
        }
        
        
        //array_map — Applies the callback to the elements of the given arrays
        function cube($n)
        {
        return($n * $n * $n);
        }

        $a = array(1, 2, 3, 4, 5);
        $b = array_map("cube", $a);
        print_r($b);
        
        
        //array_rand — Pick one or more random entries out of an array
        $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
        $rand_keys = array_rand($input, 2);
        echo $input[$rand_keys[0]] . "\n";
        echo $input[$rand_keys[1]] . "\n";
         
        
        //array_push — Push one or more elements onto the end of array
        $stack = array("orange", "banana");
        array_push($stack, "apple", "raspberry");
        print_r($stack);
        
        
        //in_array — Checks if a value exists in an array
        $os = array("Mac", "NT", "Irix", "Linux");
        if (in_array("Irix", $os)) {
        echo "Got Irix";
        }
        if (in_array("mac", $os)) {
        echo "Got mac";
        }
        
        
        //shuffle — Shuffle an array
        $numbers = range(1, 20);
        shuffle($numbers);
        foreach ($numbers as $number) {
        echo "$number ";
        }
        
        
        //count — Count all elements in an array, or something in an object
        $a[0] = 1;
        $a[1] = 3;
        $a[2] = 5;
        $result = count($a);
        // $result == 3

        $b[0]  = 7;
        $b[5]  = 9;
        $b[10] = 11;
        $result = count($b);
        // $result == 3

        $result = count(null);
        // $result == 0

        $result = count(false);
        // $result == 1
        
        
        //sort — Sort an array
        $fruits = array("lemon", "orange", "banana", "apple");
        sort($fruits);
        foreach ($fruits as $key => $val) {
        echo "fruits[" . $key . "] = " . $val . "\n";
        }
        
        
        //in_array — Checks if a value exists in an array
        $oss = array("Mac", "NT", "Irix", "Linux");
        if (in_array("Irix", $oss)) {
        echo "Got Irix";
        }
        if (in_array("mac", $oss)) {
        echo "Got mac";
        }
        
        
        
        ?>
    </body>
</html>
