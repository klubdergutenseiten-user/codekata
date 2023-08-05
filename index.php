<?php

// in php, you can access url parameters (GET) via the super global $_GET variable, such as $_GET['example']
// if you access this file on a webserver with the url parameter (querystring) set, the output changes:

// open this file in the browser with /index.php?name=Alice

// Task 1: please write a script which prints out url parameter firstname and lastname with a whitespace between
// so that /index.php?firstname=Alice&lastname=Smith prints out "Hey, my name is Alice Smith"
echo 'Hey, my name is ' . $_GET['firstname'] . ' ' . $_GET['lastname'] . '<br>';

// Task 2: sanitize the input so that only characters from the alphabet are allowed, no numbers, no whitespace
// no special charactes. All non-alphabet characters should be removed from the inputstring
// example input: /index.php?firstname=Al1c999@e&lastname=Sm!!!ith prints out "Hey, my name is Alice Smith"
// there is an "i" missing in the example input (Alce Smith)
$firstName = preg_replace("/[^A-Za-z]/",'',$_GET['firstname']);
$lastName = preg_replace("/[^A-Za-z]/",'',$_GET['lastname']);
echo 'Hey, my name is ' . $firstName . ' ' . $lastName . '<br>';

// Task 3: given the input array with $fruits, please sort the array alphabetically and print the results
// the result should be comma separated and look like: "apple, banana, lemon, pear"
$fruits = array( 'banana', 'lemon', 'pear', 'apple' );

sort($fruits);
echo implode(', ',$fruits) . '<br>';

// Task 4: given the input array with $phonebook, shuffle the array randomly and print the first element of the
// array, so that each time, the script is called, another name appears
session_start(); //to hold the current item after refresh 

$phonebook = array( 'adam', 'bob', 'cristine', 'dorie' );
shuffle($phonebook);
//four values in array in this example -> so we can call them with [0] and [1]
//if user-generated content -> check with count($phonebook) > 1 necessary

if ($phonebook[0] != $_SESSION['recentValue']) {
    echo $phonebook[0];
    $_SESSION['recentValue'] = $phonebook[0];
} else {
    echo $phonebook[1];
    $_SESSION['recentValue'] = $phonebook[1];
}

?>