<?php

// Creating array using array() function
$fruits = array ("Apple", "Orange", "Banana");

print_r($fruits);
echo "<br>";
echo $fruits[0] . " " .  $fruits[1] . " " . $fruits[2];
echo "<br>";
var_dump($fruits);

echo "<br>";

// Creating array manual indexing
$cities[0] = "Mogadishu";
$cities[1] = "Hargeisa";
$cities[2] = "Kismayo";
$cities[5] = "Bosaso";

print_r($cities);

echo "<br>";
echo "Index of 5: ", $cities[5];

echo "<br>";

// Creating array without explicit location 
$cars[] = 'Mecedes Benz';
$cars[] = 'Hilux';
$cars[] = 'BMW';
$cars[] = 'Toyoto';
$cars[] = 'Nissan';
var_dump($cars);

echo "<br>";

// Array with different type of values
$student_info = array (
    "101",
    "Mohamed Abdi Ali",
    20,
    "single",
    161.5
);

var_dump($student_info);
print_r($student_info);

echo "<br>";
echo "<br>";

// Printing Array using For Loop
for ($i = 0; $i < count($fruits); $i++) {
    echo "$fruits[$i], ";
}

echo "<br>";

// Printing Array using Foreach Loop
foreach ($cars as $car) {
    echo "$car, ";
}

echo "<br>";

foreach ($student_info as $value) {
    echo "$value <br>";
}

echo "<br>";

// Calculating sum of Array elements
$numbers = array (26, 11, 13, -4, 14, 17, 5 , 52, 7, 9,  21,  32, 2, 4, 5);

$total = 0;
foreach ($numbers as $n) {
    $total += $n;
}

echo "The Total numbers is ", $total;

echo "<br>";

// Creating Arrays by adding the two arrays
$array1 = array (1, 2, 3, 4, 5);
$array2 = array (6, 7, 8, 9, 10);

for ($i = 0; $i < count($array1); $i++)
	$array3[$i] = $array1[$i] + $array2[$i];

//printing the new array
echo "Array elements are:<br>";
foreach ($array3 as $item)
	echo ("$item, ");

echo "<br>";
echo "<br>";

// Associative Array

$student_info = array (
    "id" => 101,
    "name" => "Mohamed Abdi Ali",
    "age" => 20,
    "address" => "Hodan District",
    "status" => "single",
    "weight" => 161.5
);


print_r ($student_info);

echo "<br>";
foreach ($student_info as $value) {
    echo "$value, ";
}

echo "<br>";

foreach($student_info as $key => $value) {
    echo "$key : $value <br>";
}

?>


echo "<br>";


<?php 

// Creating Associative Array using array() function

$student_info = array (
    "id" => 101,
    "name" => "Mohamed Abdi Ali",
    "age" => 20,
    "address" => "Hodan District",
    "status" => "single",
    "weight" => 61.5
);

print_r ($student_info);

echo "<br>";

echo $student_info['address'];

echo "<br>";

// Creating Associative Array using manual indexing
$student_info["id"] = 101;
$student_info["name"] = "Mohamed Abdi Ali";
$student_info["age"] = 20;
$student_info["address"] = "Hodan District";
$student_info["status"] = "single";
$student_info["weight"] = 61.5;

print_r ($student_info);

echo "<br>";

foreach($student_info as $value) {
    echo "$value, ";
}

echo "<br>";

foreach($student_info as $key => $value) {
    echo "$key: $value <br>";
}

// Two Dimensional Array

$students = array (
    array (101, "Mohamed", 20, "single"),
    array (102, "Abdi", 30, "single"),
    array (103, "Jamac", 33, "married"),
    array (104, "Amina", 40, "single"),
    array (105, "Farah", 50, "married")
);

print_r($students);

echo "<br>";

echo $students[2][1]; // Display Jaamac

echo "<br>";

echo $students[3][4]; // Display 40

echo "<br>";

foreach ($students as $info) {
    foreach ($info as $value) {
        echo "$value, ";
    }
    echo "<br>";
}

$students = array (
    array ("id"=>101, "name"=>"Mohamed", "age"=>20, "status"=>"single"),
    array ("id"=>102, "name"=>"Abdi", "age"=>30, "status"=>"single"),
    array ("id"=>103, "name"=>"Jamac", "age"=>33, "status"=>"married"),
    array ("id"=>104, "name"=>"Amina", "age"=>40, "status"=>"single"),
    array ("id"=>105, "name"=>"Farah", "age"=>50, "status"=>"married")
);

echo "<br>";

echo $students[2]["name"]; // Display Jaamac

echo "<br>";

echo $students[3]["age"]; // Display 40

echo "<br>";

foreach ($students as $info) {
    foreach ($info as $key => $value) {
        echo "$key : $value ";
    }
    echo "<br>";
}



?>