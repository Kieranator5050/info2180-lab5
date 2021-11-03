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

//Generate Table
echo "<table>";
echo "<thead>
  <tr>
    <th>Country Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>
</thead>";
foreach ($results as $row){
  //var_dump($row);
  $name = $row['name'];
  $continent = $row['continent'];
  $independence_year = $row['independence_year'];
  $head_of_state = $row['head_of_state'];
  echo "<tbody>
    <tr>
      <td>$name</td>
      <td>$continent</td>
      <td>$independence_year</td>
      <td>$head_of_state</td>
    </tr>
  </tbody>";
}
echo "</table>";
?>
