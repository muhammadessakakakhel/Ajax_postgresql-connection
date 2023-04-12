<?php
// phpinfo();

$host = "localhost"; 
$port = "5432";
$user = "postgres";
$password = "essa@nust125";
$database = "essa1";
$conn = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
if (!$conn) {
    echo "Connection failed";
}
else {
    $sql = pg_query($conn, "SELECT * FROM mytable");
    if (!$sql){
        echo "Data fetch error";
    }
    else {
        $data = array();
        while ($row = pg_fetch_assoc($sql)){
            $data[] = $row;
        }
        echo json_encode($data, JSON_PRETTY_PRINT);

    }
}
?>
