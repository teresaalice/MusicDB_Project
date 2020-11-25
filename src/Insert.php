<?php
$servername = "localhost";
$username = "root"; // your username
$password = "root"; //your password
$database = "community_music_database";
// Getting values
$AID = $_POST['artistID'];
$AName = $_POST['artistName'];
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection Succesful! <br>";
}
//construct the query
$query = "INSERT INTO artist VALUES('$AID','$AName')";
//Execute the query
if ($conn->query($query) === true) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
