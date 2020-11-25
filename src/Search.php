<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "community_music_database";
// Getting values
$SArtist = $_POST['artistName'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// construct the query
$query = "SELECT artistID, artistName FROM artist WHERE artistName = '$SArtist'";
//Execute the query
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<h1>Artist Search Result";
    echo "<br /><br />";
    echo "<table align=\"center\"border= \"1\">";
    echo "<tr><th>Artist</th><th>Artist Name</th></tr>";
    // output data of each row

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["artistID"] . "</td><td> " . $row["artistName"] . "</td></tr></table>";
    }
} else {
    $query = "SELECT artistID, artistName FROM artist";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<h1>Artist Search Result";
        echo "<br /><br />";
        echo "<table align=\"center\"border= \"1\">";
        echo "<tr><th>Artist</th><th>Artist Name</th></tr>";
        // output data of each row

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["artistID"] . "</td><td> " . $row["artistName"] . "</td></tr>";
        }

        echo "</table>";

    }
}
$conn->close();
