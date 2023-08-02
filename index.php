<?php
// >>> KGAVRAN: Globale Debug-Variable, um zusätzliche Debug-Meldungen auszugeben, wo gewünscht.
$debug = FALSE;

// >>> KGAVRAN: Erstellen eines gültigen HTML-Gerüsts um die zugehörige CSS-Datei zu laden und nicht zuletzt auch compliant zu sein.
echo '<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Code Kata</h1>';

// in php, you can access url parameters (GET) via the super global $_GET variable, such as $_GET['example']
// if you access this file on a webserver with the url parameter (querystring) set, the output changes:
// open this file in the browser with /index.php?name=Alice

// >>> KGAVRAN: Example-Ausgabe findet nur statt, wenn ein GET-Parameter "name" existiert.
if(isset($_GET['name']))
{
    echo '<h2>Example Task</h2>';
    echo 'Hey, my name is ' . $_GET['name'];
    echo '<br><hr>';
}

// Task 1: please write a script which prints out url parameter firstname and lastname with a whitespace between
// so that /index.php?firstname=Alice&lastname=Smith prints out "Hey, my name is Alice Smith"

// >>> KGAVRAN: Ausgabe Task 1 & 2 finden nur statt, wenn die beiden GET-Parameter "firstname" und "lastname" existieren. 
// >>> KGAVRAN: In Task 1 werden die beiden Parameter unbereinigt ausgegeben.
if(isset($_GET['firstname']) and isset($_GET['lastname']))
{
    echo '<h2>Task 1</h2>';
    echo 'Hey, my name is ' . $_GET['firstname'] . ' ' . $_GET['lastname'];
    echo '<br><hr>';
}

// Task 2: sanitize the input so that only characters from the alphabet are allowed, no numbers, no whitespace
// no special charactes. All non-alphabet characters should be removed from the inputstring
// example input: /index.php?firstname=Al1c999@e&lastname=Sm!!!ith prints out "Hey, my name is Alice Smith"

// >>> KGAVRAN: In Task 2 werden die beiden Parameter durch die Funktion "sanitize_data()" bereinigt ausgegeben.
if(isset($_GET['firstname']) and isset($_GET['lastname']))
{
    echo '<h2>Task 2</h2>';
    echo 'Hey, my name is ' . sanitize_data($_GET['firstname']) . ' ' . sanitize_data($_GET['lastname']);
    echo '<br><hr>';
}

// >>> KGAVRAN: Funktion "sanitize_data" nimmt einen String mit den Ursprungswerten als String und ersetzt mit einem regulären Ausdruck alle  Nicht-Alphabet-Zeichen durch einen leeren String. Auch ist mir hier aufgefallen, dass das gegebene Beispiel nicht korrekt ist: Aus "Al1c999@e" wird nicht "Alice", wenn man alle Nicht-Alphabet-Zeichen entfernt, sondern "Alce" ;-)
//  >>> KGAVRAN: Zusätzlich wird in Abhängigkeit der globalen Variable "$debug" eine Debug-Meldungen ausgegeben.

function sanitize_data($unsanitized_data) {
    global $debug;

    if ($debug) {
        echo '<br><code>FUNCTION sanitize_data():</code><br>';
        echo '<code> >> unsanitized_data = '.$unsanitized_data.'</code><br>'; 
    }

    $sanitized_data = preg_replace("/[^a-zA-Z]+/", "", $unsanitized_data);

    if ($debug) { 
        echo '<code> >> sanitized_data = '.$sanitized_data.'</code><br>';
    }

    return $sanitized_data;
}

// Task 3: given the input array with $fruits, please sort the array alphabetically and print the results
// the result should be comma separated and look like: "apple, banana, lemon, pear"

// >>> KGAVRAN: Array wird mit der Funktion "sort()" aus der PHP-Standardbibliothek sortiert. Anschliessend wird mit der Funktion "implode()" das Array, mit einem Komma als Trennzeichen, zu einem String verbunden.

$fruits = array( 'banana', 'lemon', 'pear', 'apple' );
sort($fruits);
$fruits_list = implode(', ', $fruits);

echo '<h2>Task 3</h2>';
echo 'Sorted fruits - RESULTS: <b>'.$fruits_list;
echo '</b><br><hr>';

// Task 4: given the input array with $phonebook, shuffle the array randomly and print the first element of the
// array, so that each time, the script is called, another name appears

// >>> KGAVRAN: Auch hier wird PHP-Standardbibliothek genutzt um das Ursprung-Array zufällig zu mischen und dann das erste Element (mit dem Index 0) abzugreifen.

echo '<h2>Task 4</h2>';
$phonebook = array( 'adam', 'bob', 'cristine', 'dorie' );
shuffle($phonebook);
echo 'Random phone number - RESULT: <b>'.$phonebook[0];
echo '</b><br><hr>';
echo '</body> </html>';