<?php

// in php, you can access url parameters (GET) via the super global $_GET variable, such as $_GET['example']
// if you access this file on a webserver with the url parameter (querystring) set, the output changes:

// open this file in the browser with /index.php?name=Alice

echo 'Hey, my name is ' . $_GET['name'] . '<br>';


// Task 1: please write a script which prints out url parameter firstname and lastname with a whitespace between
// so that /index.php?firstname=Alice&lastname=Smith prints out "Hey, my name is Alice Smith"

echo 'Hey, my name is ' . $_GET['firstname'] . ' ' . $_GET['lastname'] . '<br>';


// Task 2: sanitize the input so that only characters from the alphabet are allowed, no numbers, no whitespace
// no special charactes. All non-alphabet characters should be removed from the inputstring
// example input: /index.php?firstname=Ali1c999@e&lastname=Sm!!!ith prints out "Hey, my name is Alice Smith"

echo 'Hey, my name is ' . preg_replace("/[^A-Za-z]/", '', $_GET['firstname']) . ' ' . preg_replace("/[^A-Za-z]/", '', $_GET['lastname']) . '<br>';

// Task 3: given the input array with $fruits, please sort the array alphabetically and print the results
// the result should be comma separated and look like: "apple, banana, lemon, pear"

$fruits = array( 'banana', 'lemon', 'pear', 'apple' );
sort($fruits);
$fruitsLength = count($fruits);
$outputFruits = '';
for($i = 0; $i < $fruitsLength; $i++){
	$outputFruits = $outputFruits . $fruits[$i] . ', ';
}	

echo substr($outputFruits, 0, -2) . '<br>';

// Task 4: given the input array with $phonebook, shuffle the array randomly and print the first element of the
// array, so that each time, the script is called, another name appears

$phonebook = array( 'adam', 'bob', 'cristine', 'dorie' );
shuffle($phonebook);

echo $phonebook[0];

// http://localhost/index.php?firstname=Ali1c999@e&lastname=Sm!!!ith&name=helloWorld
?>