<?php

/* =====================================================
   CSS
   ===================================================== */

echo "
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
    margin: 30px;
    color: #222;
}

h1 {
    text-align: center;
    color: #1f4e79;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px #ccc;
}

h2 {
    color: white;
    background-color: #1f4e79;
    padding: 10px;
    border-radius: 6px;
    margin-top: 30px;
}

h3 {
    color: #1f4e79;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin-top: 10px;
    background-color: white;
    box-shadow: 0 2px 5px #ccc;
}

th {
    background-color: #1f4e79;
    color: white;
    padding: 10px;
    border: 1px solid #999;
}

td {
    padding: 10px;
    text-align: center;
    border: 1px solid #999;
}

tr:nth-child(even) {
    background-color: #eef4f8;
}

tr:hover {
    background-color: #dceaf5;
}

.result-pass {
    color: green;
    font-weight: bold;
}

.result-fail {
    color: red;
    font-weight: bold;
}

.info {
    background-color: white;
    padding: 15px;
    width: 80%;
    border-radius: 6px;
    box-shadow: 0 2px 5px #ccc;
}

</style>
";


echo "<h1>PHP Assignment 2</h1>";

/* =====================================================
   QUESTION 1
   One-Dimensional Array
   ===================================================== */

echo "<h2>Question 1</h2>";

$array = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

echo "<div class='info'>";

echo "<b>All Elements:</b> ";

foreach ($array as $value) {
    echo $value . " ";
}

echo "<br><br>";

$total = 0;
$evenTotal = 0;
$oddTotal = 0;

foreach ($array as $value) {

    $total += $value;

    if ($value % 2 == 0) {
        $evenTotal += $value;
    } else {
        $oddTotal += $value;
    }
}

echo "Total of all elements: " . $total . "<br>";
echo "Total of even elements: " . $evenTotal . "<br>";
echo "Total of odd elements: " . $oddTotal . "<br>";

$min = min($array);

echo "Minimum element: " . $min . "<br>";
echo "Minimum positions: ";

foreach ($array as $index => $value) {

    if ($value == $min) {
        echo $index . " ";
    }
}

echo "<br>";

$max = max($array);

echo "Maximum element: " . $max . "<br>";
echo "Maximum positions: ";

foreach ($array as $index => $value) {

    if ($value == $max) {
        echo $index . " ";
    }
}

echo "</div>";

echo "<br>";


/* =====================================================
   QUESTION 2
   Two-Dimensional Associative Array
   ===================================================== */

echo "<h2>Question 2</h2>";

$colors = [

    "Light" => [
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ],

    "Normal" => [
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ],

    "Dark" => [
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    ]
];

echo "<table>";

echo "<tr>";
echo "<th>Color Level</th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";

foreach ($colors as $level => $color) {

    echo "<tr>";

    echo "<th>" . $level . "</th>";

    foreach ($color as $value) {

        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}

echo "</table>";

echo "<br>";


/* =====================================================
   QUESTION 3
   Square Two-Dimensional Array
   ===================================================== */

echo "<h2>Question 3</h2>";

$array2 = [
    [2, -6, 8],
    [-6, 1, 6],
    [7, 8, -6]
];


/* Display Array */

echo "<table>";

echo "<tr>";
echo "<th>Array Index</th>";
echo "<th>Element 1</th>";
echo "<th>Element 2</th>";
echo "<th>Element 3</th>";
echo "</tr>";

foreach ($array2 as $index => $row) {

    echo "<tr>";

    echo "<th>Index " . $index . "</th>";

    foreach ($row as $value) {

        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}

echo "</table>";

echo "<br>";


/* Odd, Even and Total */

$oddTotal = 0;
$evenTotal = 0;
$total = 0;

foreach ($array2 as $row) {

    foreach ($row as $value) {

        $total += $value;

        if ($value % 2 == 0) {

            $evenTotal += $value;

        } else {

            $oddTotal += $value;
        }
    }
}

echo "<div class='info'>";

echo "Total of odd elements: " . $oddTotal . "<br>";
echo "Total of even elements: " . $evenTotal . "<br>";
echo "Total of all elements: " . $total . "<br>";

echo "</div>";

echo "<br>";


/* Index Totals */

echo "<h3>Index Totals</h3>";

echo "<table>";

echo "<tr>";
echo "<th>Array Index</th>";
echo "<th>Index Total</th>";
echo "</tr>";

foreach ($array2 as $index => $row) {

    $indexTotal = 0;

    foreach ($row as $value) {

        $indexTotal += $value;
    }

    echo "<tr>";
    echo "<td>Index " . $index . "</td>";
    echo "<td>" . $indexTotal . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<br>";


/* Element Totals */

echo "<h3>Element Totals</h3>";

echo "<table>";

echo "<tr>";
echo "<th>Element</th>";
echo "<th>Element Total</th>";
echo "</tr>";

$elements = count($array2[0]);

for ($element = 0; $element < $elements; $element++) {

    $elementTotal = 0;

    foreach ($array2 as $row) {

        $elementTotal += $row[$element];
    }

    echo "<tr>";
    echo "<td>Element " . ($element + 1) . "</td>";
    echo "<td>" . $elementTotal . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<br>";


/* Diagonal Totals */

$mainDiagonal = 0;

for ($i = 0; $i < count($array2); $i++) {

    $mainDiagonal += $array2[$i][$i];
}

echo "<div class='info'>";

echo "Main diagonal total: " . $mainDiagonal . "<br>";

$otherDiagonal = 0;
$size = count($array2);

for ($i = 0; $i < $size; $i++) {

    $otherDiagonal += $array2[$i][$size - 1 - $i];
}

echo "Other diagonal total: " . $otherDiagonal . "<br>";

echo "</div>";

echo "<br>";


/* Minimum */

$flatArray = [];

foreach ($array2 as $row) {

    foreach ($row as $value) {

        $flatArray[] = $value;
    }
}

$min = min($flatArray);

echo "<div class='info'>";

echo "Minimum element: " . $min . "<br>";

echo "Minimum Index:<br>";

foreach ($array2 as $i => $row) {

    foreach ($row as $j => $value) {

        if ($value == $min) {

            echo "Array Index: [" . $i . "][" . $j . "]<br>";
        }
    }
}

echo "<br>";


/* Maximum */

$max = max($flatArray);

echo "Maximum element: " . $max . "<br>";

echo "Maximum Index:<br>";

foreach ($array2 as $i => $row) {

    foreach ($row as $j => $value) {

        if ($value == $max) {

            echo "Array Index: [" . $i . "][" . $j . "]<br>";
        }
    }
}

echo "</div>";

echo "<br>";


/* =====================================================
   QUESTION 4
   Student Information
   ===================================================== */

echo "<h2>Question 4</h2>";

$students = [

    "CA221" => [
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ],

    "CA223" => [
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ],

    "CA224" => [
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    ]
];

echo "<table>";

echo "<tr>";
echo "<th>Student ID</th>";
echo "<th>Student Name</th>";
echo "<th>Phone Number</th>";
echo "<th>Home Address</th>";
echo "</tr>";

foreach ($students as $id => $student) {

    echo "<tr>";

    echo "<td>" . $id . "</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}

echo "</table>";

echo "<br>";


/* =====================================================
   QUESTION 5
   Student Transcript
   ===================================================== */

echo "<h2>Question 5</h2>";

$transcript = [

    "Semester 1" => [

        "subject1" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ],

        "subject2" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ],

        "subject3" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ]
    ],

    "Semester 2" => [

        "subject1" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 0,
            "Total" => 45,
            "Status" => "Fail"
        ],

        "subject2" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ],

        "subject3" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ]
    ]
];


/* Combined Semester Table */

echo "<table>";

echo "<tr>";
echo "<th>Semester</th>";
echo "<th>Course</th>";
echo "<th>Coursework 1</th>";
echo "<th>Midterm Exam</th>";
echo "<th>Coursework 2</th>";
echo "<th>Final Exam</th>";
echo "<th>Total Mark</th>";
echo "<th>Result</th>";
echo "</tr>";

foreach ($transcript as $semester => $courses) {

    foreach ($courses as $course => $data) {

        echo "<tr>";

        echo "<td>" . $semester . "</td>";
        echo "<td>" . $course . "</td>";
        echo "<td>" . $data["CW1"] . "</td>";
        echo "<td>" . $data["MidTerm"] . "</td>";
        echo "<td>" . $data["CW2"] . "</td>";
        echo "<td>" . $data["Final"] . "</td>";
        echo "<td>" . $data["Total"] . "</td>";

        if ($data["Status"] == "Pass") {

            echo "<td class='result-pass'>Pass</td>";

        } else {

            echo "<td class='result-fail'>Fail</td>";
        }

        echo "</tr>";
    }
}

echo "</table>";

echo "<br>";

?>
