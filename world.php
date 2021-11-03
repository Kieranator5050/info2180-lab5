<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

//Sanitize Querry String
$country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);

//Connect to db and make querry
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
foreach ($results as $row){
  $name = $row['name']; $head_of_state = $row['head_of_state'];
  echo "<li> $name is ruled by $head_of_state </li>";
}
echo "</ul>";
?>
