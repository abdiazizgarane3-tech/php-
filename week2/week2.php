<?php

// ==========================================================
// 1. Find the Greatest and Smallest Number
// ==========================================================

$a = 25;
$b = 10;
$c = 40;

// Find the greatest number
if ($a >= $b && $a >= $c) {
    $greatest = $a;
} elseif ($b >= $a && $b >= $c) {
    $greatest = $b;
} else {
    $greatest = $c;
}

// Find the smallest number
if ($a <= $b && $a <= $c) {
    $smallest = $a;
} elseif ($b <= $a && $b <= $c) {
    $smallest = $b;
} else {
    $smallest = $c;
}

// Display the results
echo "Greatest: $greatest <br>";
echo "Smallest: $smallest";

echo "<br><br>";


// ==========================================================
// 2. Check Divisibility by 3 and 5
// ==========================================================

$num = 15;

// Check whether the number is divisible by 3 and 5
if ($num % 3 == 0 && $num % 5 == 0) {
    echo "$num is divisible by both 3 and 5.";
} elseif ($num % 3 == 0) {
    echo "$num is divisible by 3.";
} elseif ($num % 5 == 0) {
    echo "$num is divisible by 5.";
} else {
    echo "$num is divisible by neither 3 nor 5.";
}

echo "<br><br>";


// ==========================================================
// 3. Print Odd Numbers from 2 to 20
//    and Even Numbers from 35 to 7
// ==========================================================

echo "Odd numbers from 2 to 20:<br>";

// Loop from 2 to 20
for ($i = 2; $i <= 20; $i++) {

    // Check if the number is odd
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}

echo "<br><br>";

echo "Even numbers from 35 to 7:<br>";

// Loop backwards from 35 to 7
for ($i = 35; $i >= 7; $i--) {

    // Check if the number is even
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}

echo "<br><br>";


// ==========================================================
// 4. Find Numbers Divisible by Both 2 and 5
// ==========================================================

echo "Numbers divisible by both 2 and 5:<br>";

// Count backwards from 50 to 2
for ($i = 50; $i >= 2; $i--) {

    // Check if the number is divisible by both 2 and 5
    if ($i % 2 == 0 && $i % 5 == 0) {
        echo $i . " ";
    }
}

echo "<br><br>";


// ==========================================================
// 5. Reverse a Number
// ==========================================================

$num = 12345;
$reverse = 0;

// Continue until all digits are reversed
while ($num > 0) {

    // Get the last digit
    $digit = $num % 10;

    // Add the digit to the reversed number
    $reverse = ($reverse * 10) + $digit;

    // Remove the last digit
    $num = (int)($num / 10);
}

// Display the reversed number
echo "Reverse: $reverse";

echo "<br><br>";


// ==========================================================
// 6. Find the LCM (Least Common Multiple)
// ==========================================================

$a = 8;
$b = 12;

// Start from the larger number
if ($a > $b) {
    $lcm = $a;
} else {
    $lcm = $b;
}

// Find the first number divisible by both
while (true) {

    if ($lcm % $a == 0 && $lcm % $b == 0) {
        break;
    }

    $lcm++;
}

// Display the LCM
echo "LCM of $a and $b = $lcm";

echo "<br><br>";


// ==========================================================
// 7. Find the HCF (Highest Common Factor)
// ==========================================================

$a = 18;
$b = 24;

// Use the Euclidean Algorithm
while ($b != 0) {

    $remainder = $a % $b;

    $a = $b;
    $b = $remainder;
}

// Display the HCF
echo "HCF = $a";

echo "<br><br>";


// ==========================================================
// 8. Create a 12 × 12 Multiplication Table
// ==========================================================

// Start the table
echo "<table border='1' cellpadding='8' cellspacing='0'>";

// Create rows
for ($i = 1; $i <= 12; $i++) {

    echo "<tr>";

    // Create columns
    for ($j = 1; $j <= 12; $j++) {

        // Multiply row and column numbers
        echo "<td>" . ($i * $j) . "</td>";
    }

    echo "</tr>";
}

// End the table
echo "</table>";

echo "<br><br>";


// ==========================================================
// 9. Check Whether a Number is Prime
// ==========================================================

$num = 17;
$isPrime = true;

// Numbers less than or equal to 1 are not prime
if ($num <= 1) {

    $isPrime = false;

} else {

    // Check for divisors
    for ($i = 2; $i < $num; $i++) {

        if ($num % $i == 0) {

            $isPrime = false;
            break;
        }
    }
}

// Display the result
if ($isPrime) {
    echo "$num is a Prime number.";
} else {
    echo "$num is a Non-Prime number.";
}

echo "<br><br>";


// ==========================================================
// 10. Print Prime Numbers from 10 to 50
// ==========================================================

echo "Prime numbers from 10 to 50:<br>";

// Check every number from 10 to 50
for ($num = 10; $num <= 50; $num++) {

    // Assume the number is prime
    $isPrime = true;

    // Numbers less than or equal to 1 are not prime
    if ($num <= 1) {
        $isPrime = false;
    }

    // Check if the number has a divisor
    for ($i = 2; $i < $num; $i++) {

        if ($num % $i == 0) {

            $isPrime = false;
            break;
        }
    }

    // Display only prime numbers
    if ($isPrime) {
        echo $num . " ";
    }
}

?>