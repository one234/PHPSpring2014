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
        /*
          Exlode - Returns an array of strings created by splitting 
         the string parameter on boundaries formed by the delimiter.*/
         
        $input1 = "hello";
        $input2 = "hello,there";
        var_dump( explode( ',', $input1 ) );
        var_dump( explode( ',', $input2 ) );
        
        
        
        /*sha1 Calculates the sha1 
         hash of str using the » US Secure Hash Algorithm 1.*/
         
        $str = 'apple';
        if (sha1($str) === 'd0be2dc421be4fcd0172e5afceea3970e2f3d940') {
        echo "Would you like a green or red apple?";
        }
        
        
        //htmlentities — Convert all applicable characters to HTML entities
        $str = "A 'quote' is <b>bold</b>";

        // Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
        echo htmlentities($str);

        // Outputs: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
        echo htmlentities($str, ENT_QUOTES);
        
        
        
        /*md5 -Calculates the MD5 hash of str using the » RSA Data Security, Inc.
         MD5 Message-Digest Algorithm, and returns that hash.*/
        $str1 = 'apple';

        if (md5($str1) === '1f3870be274f6c49b3e31a0c6728957f') {
        echo "Would you like a green or red apple?";
        }
        
        /*strip_tags - This function tries to return a string with all NULL bytes, HTML and PHP tags stripped from a given str. It uses the same tag 
        stripping state machine as the fgetss() function.*/
        $text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
        echo strip_tags($text);
        echo "\n";

         // Allow <p> and <a>
        echo strip_tags($text, '<p><a>');
        
        
        /*trim - This function returns a string with whitespace stripped from the beginning and end of str. Without the second 
        parameter, trim() will strip these characters:*/
        function trim_value(&$value) 
        { 
        $value = trim($value); 
        }

        $fruit = array('apple','banana ', ' cranberry ');
        var_dump($fruit);

        array_walk($fruit, 'trim_value');
        var_dump($fruit);
         
        
        
        /*ucwords - Returns a string with the first character of each word in 
        str capitalized, if that character is alphabetic.
        The definition of a word is any string of characters that is immediately after 
        a whitespace (These are: space, form-feed, newline, carriage return, horizontal tab, and vertical tab).*/
        $foo = 'hello world!';
        $foo = ucwords($foo);             // Hello World!

        $bar = 'HELLO WORLD!';
        $bar = ucwords($bar);             // HELLO WORLD!
        $bar = ucwords(strtolower($bar)); // Hello World!
        
        
        //strlen - Returns the length of the given string.
        $str2 = 'abcdef';
        echo strlen($str2); // 6

        $str2 = ' ab cd ';
        echo strlen($str2); // 7
        
        
        //str_shuffle — Randomly shuffles a string
        $str3 = 'abcdef';
        $shuffled = str_shuffle($str3);
        // This will echo something like: bfdaec
        echo $shuffled;
        
        
        //ord — Return ASCII value of character
        $str4 = "\n";
        if (ord($str4) == 10) {
        echo "The first character of \$str is a line feed.\n";
        }
        
        
        
        ?>
    </body>
</html>
