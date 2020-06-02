<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "unep";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$string = file_get_contents("http://geodata.grid.unep.ch/api/countries/KE/variables/331");
$json = json_decode($string, true);

//"iso-2":"KE","year":1965,"value":35.28

foreach ($json as $item) {
    $sql = "INSERT INTO geodata (iso2, year, value)
                    VALUES ('" . $item['iso-2'] . "'," . $item['year'] . ",'" . $item['value'] . "')";
    if ($conn->query($sql) === TRUE) {
        echo "gepdata added successfully" . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}
$conn->close();
?>