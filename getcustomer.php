<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php

$host = "localhost"; 
$port = "5432";
$user = "postgres";
$password = "essa@nust125";
$database = "essa1";
$conn = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

if (!$conn) {
  die('Could not connect: ' . pg_last_error($conn));
}

$sql = "SELECT * FROM mytable";
$result = pg_query($conn,$sql);

echo "<table>
<tr>
<th>first name</th>
<th>last name</th>
<th>age</th>
<th>Hometown</th>
<th>job</th>
</tr>";
while($row = pg_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['firstname'] . "</td>";
  echo "<td>" . $row['lastname'] . "</td>";
  echo "<td>" . $row['age'] . "</td>";
  echo "<td>" . $row['hometown'] . "</td>";
  echo "<td>" . $row['job'] . "</td>";
  echo "</tr>";
}
echo "</table>";
pg_close($conn);
?>
</body>
</html>
