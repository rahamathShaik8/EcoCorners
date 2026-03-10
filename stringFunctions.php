<?php
    echo "string functions<br>";
    $text="hello , we are learning string functions";
    $userName="raha";
    echo "userName length:".strlen($userName)."<br>";
    echo "no of words in text:".str_word_count($text)."<br>";   
    echo "reverse userName:".strrev($userName)."<br>";
    echo "userName in Uppercase:".strtoupper($userName)."<br>";
    echo "userName in Lowercase:".strtolower($userName)."<br>";
    echo "ucfirst of UserName:".ucfirst($userName)."<br>";//Converts the first character of a string to uppercase.
    echo "ucwords of text:".ucwords($text)."<br>";//Converts the first character of each word in a string to uppercase.
    echo "position of string:".strpos($text,"string")."<br>";//Finds the position of the first occurrence of a substring in a string.
    echo "replace string with strings:".str_replace("string","strings",$text)."<br>";//Replace all occurrences of the search string with the replacement string.
    echo "Substring: " . substr($text, 0, 10) . "<br>";
    echo "Trimmed: '" . trim($text) . "'<br>";
    echo "Left Trim: '" . ltrim($text) . "'<br>";
    echo "Right Trim: '" . rtrim($text) . "'<br>";
    echo "strcmp: " . strcmp("PHP", "php") . "<br>";// -1 bcoz str1 <str2 
    echo "strcasecmp: " . strcasecmp("PHP", "php") . "<br>";//case insensitive
     echo strcmp("hello world","priyas world");
     $unsafe = "<script>alert('hack')</script>";
    echo "htmlspecialchars: " . htmlspecialchars($unsafe) . "<br>";
    echo "addslashes: " . addslashes("O'Reilly") . "<br>";
 ?>