<!-- 1. A program to count from 5 to 15 using PHP loop -->
<?php
// Using a for loop to count from 5 to 15
for ($i = 5; $i <= 15; $i++) {
    echo $i . "<br />"; // Output the current number 
}
?>


<!-- 2. A program to print “Hello World” using PHP variable. -->
<?php
// Define a variable
$text = "Hello World";

// Print the value of the variable
echo $text;
?>


<!-- 3. A program to check student grade based on marks. -->
<?php
// Define the marks variable which contains marks of a student
$marks = 68;
        
// Check the grade based on marks
if ($marks >= 90) {
    $grade = "A+";
} elseif ($marks >= 80) {
    $grade = "A";
} elseif ($marks >= 70) {
    $grade = "B";
} elseif ($marks >= 60) {
    $grade = "C";
} elseif ($marks >= 50) {
    $grade = "D";
} else {
    $grade = "F";
}

// Print the result
echo "Student Result" . "<br>";
echo "Marks: " . $marks . "<br>";
echo "Grade: " . $grade;
?>


<!-- 4. A program to find factorial of a number using loop in PHP -->
<?php
// Define the input number
$num = 5;

// Initialize the fact variable
$fact = 1;

// Calculate the factorial using a loop
for ($i = 1; $i <= $num; $i++) {
    $fact *= $i;
}

// Print the result
echo "Input Number: " . $num . "<br>";
echo "Factorial: " . $fact;
?>


<!-- 5. A php program to create a given pattern with * using for loop -->
<?php
// Defining the number of rows for the pattern
$rows = 8;

// Loop through each row
for ($i = 1; $i <= $rows; $i++) {
    // Printing the asterisks for the current row
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    // Prints a new line after each row
    echo "<br>";
}
?>


<!-- 6. A PHP script which displays the capital and country name from the given array $list. -->
<?php
// Define the array with country => capital pairs
$list = array(
    "Italy" => "Rome",
    "Luxembourg" => "Luxembourg",
    "Belgium" => "Brussels",
    "Denmark" => "Copenhagen",
    "Finland" => "Helsinki",
    "France" => "Paris",
    "Slovakia" => "Bratislava",
    "Slovenia" => "Ljubljana",
    "Germany" => "Berlin",
    "Greece" => "Athens",
    "Ireland" => "Dublin",
    "Netherlands" => "Amsterdam",
    "Portugal" => "Lisbon",
    "Spain" => "Madrid",
    "Sweden" => "Stockholm",
    "United Kingdom" => "London",
    "Cyprus" => "Nicosia",
    "Lithuania" => "Vilnius",
    "Czech Republic" => "Prague",
    "Estonia" => "Tallin",
    "Hungary" => "Budapest",
    "Latvia" => "Riga",
    "Malta" => "Valetta",
    "Austria" => "Vienna",
    "Poland" => "Warsaw"
);

// Sort the array by the name of the capital
asort($list);

// Loop through the sorted array and display the capital and country name
foreach ($list as $country => $capital) {
    echo "Capital of " . $country . ": " . $capital . "<br>";
}
?>


<!-- 7. A PHP function that checks whether a passed string is a palindrome or not? -->
<?php
function isPalindrome($str)
{
    // Convert the input string to lowercase and remove non-alphanumeric characters
    $str = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $str));
    
    // Reverse the input string
    $reversedStr = strrev($str);
    
    // Compare the input string with its reversed version
    if ($str == $reversedStr) {
        return true; // The input string is a palindrome
    } else {
        return false; // The input string is not a palindrome
    }
}

// Test the function with some example inputs
$input1 = "hannah";
$input2 = "bachelor";
$input3 = "spring";
$input4 = "eye";

echo "Input: " . $input1 . "<br>";
echo "Is the word " . $input1 . " Palindrome? " . (isPalindrome($input1) ? "Yes" : "No") . "<br>";
echo "<br>";
echo "Input: " . $input2 . "<br>";
echo "Is the word " . $input2 . " Palindrome? " . (isPalindrome($input2) ? "Yes" : "No") . "<br>";
echo "<br>";
echo "Input: " . $input3 . "<br>";
echo "Is the word " . $input3 . " Palindrome? " . (isPalindrome($input3) ? "Yes" : "No") . "<br>";
echo "<br>";
echo "Input: " . $input4 . "<br>";
echo "Is the word " . $input4 . " Palindrome? " . (isPalindrome($input4) ? "Yes" : "No") . "<br>";
?>


<!-- 8. A PHP program to swap two variables -->
<?php
$var1 = 12;
$var2 = 21;

echo "Before swapping: <br>";
echo "a = " . $var1 . "<br>";
echo "b = " . $var2 . "<br>";

// Swap the values of $var1 and $var2 using a temporary variable
$temp = $var1;
$var1 = $var2;
$var2 = $temp;

echo "<br>After swapping: <br>";
echo "a = " . $var1 . "<br>";
echo "b = " . $var2 . "<br>";
?>


<!-- 9. A PHP program to print the multiple of a given number -->
<?php
define('a', 10); // Define the given number

echo "First ten multiples of " . a . ":<br>";

for ($i = 1; $i <= 10; $i++) {
    echo a * $i . "<br>"; // Print the multiples of a with line break
}
?>


<!-- 10. A PHP program to find whether given number is Armstrong or not. -->
<?php
$num = 371; // Given number to check

// Convert the number to string to find the length
$num_str = (string)$num;
$length = strlen($num_str);

$sum = 0;
$temp = $num;

// Loop through each digit of the number
while ($temp > 0) {
    $digit = $temp % 10; // Get the last digit
    $sum += pow($digit, $length); // Raise the digit to the power of length and add to sum
    $temp = floor($temp / 10); // Remove the last digit
}

// Compare the sum with the original number
if ($sum == $num) {
    echo $num . " is an Armstrong number.";
} else {
    echo $num . " is not an Armstrong number.";
}
?>