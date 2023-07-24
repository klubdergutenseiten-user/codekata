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
// example input: /index.php?firstname=Al1c999@e&lastname=Sm!!!ith prints out "Hey, my name is Alice Smith"
// correction of example input: /index.php?firstname=Ali1c999@e&lastname=Sm!!!ith
function sanitizeInput($input)
{
    return preg_replace("/[^A-Za-z]/", '', $input);
}
$firstname = isset($_GET['firstname']) ? sanitizeInput($_GET['firstname']) : '';
$lastname = isset($_GET['lastname']) ? sanitizeInput($_GET['lastname']) : '';
echo 'Hey, my name is ' . $firstname . ' ' . $lastname . '<br>';

// Task 3: given the input array with $fruits, please sort the array alphabetically and print the results
// the result should be comma separated and look like: "apple, banana, lemon, pear"
$fruits = array('banana', 'lemon', 'pear', 'apple');
sort($fruits);
$lastIndex = count($fruits) - 1;
foreach ($fruits as $index => $fruit) {
    echo $fruit;
    if ($index < $lastIndex) {
        echo ", ";
    } else {
        echo "<br>";
    }
}

// Task 4: given the input array with $phonebook, shuffle the array randomly and print the first element of the
// array, so that each time, the script is called, another name appears
$phonebook = array('adam', 'bob', 'cristine', 'dorie');
shuffle($phonebook);
echo $phonebook[0];
