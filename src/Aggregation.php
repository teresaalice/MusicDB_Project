<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <title>CPSC MusicDB Project</title>
</head>

<body>
    <div id="wrapper" class="container">
        <header class="page-header">
            <div class="jumbotron">
                <h1>MusicDB - Group Project</h1>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="index.html" class="nav-link">Index</a>
                </li>
                <li><a href="Insert.html" class="nav-link">Insert</a></li>
                <li>
                    <a href="Select.html" class="nav-link">Select/Projection</a>
                </li>
                <li>
                    <a href="Join.html" class="nav-link">Join</a>
                </li>
                <li>
                    <a href="Division.php" class="nav-link">Division</a>
                </li>
                <li>
                    <a href="Aggregation.php" class="nav-link">Aggregation</a>
                </li>
                <li>
                    <a href="Nested.php" class="nav-link">Nested</a>
                </li>
                <li>
                    <a href="Delete.html" class="nav-link">Delete</a>
                </li>
                <li>
                    <a href="Update.html" class="nav-link">Update</a>
                </li>
            </ul>
        </nav>
        <main class="container">
            <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "musicdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// construct the query
$query = "SELECT MIN(releaseYear) FROM album;";
//Execute the query
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<br />";
    echo "<h3 align=\"center\">Year of the oldest album</h3>";
    echo "<table class=\"table table-striped\" align=\"center\">";
    echo "<thead><tr><th>Year</th></tr></thead><tbody>";

    // output data of each row

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["MIN(releaseYear)"] . "</td></tr>";
    }
    echo "</tbody></table>";

    echo "<br /><br />";

}
$query = "SELECT MAX(songNumber)
FROM albumsongs;";
//Execute the query
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<br />";
    echo "<h3 align=\"center\">Maximum number of songs in an Album</h3>";
    echo "<table class=\"table table-striped\" align=\"center\">";
    echo "<thead><tr><th>Max Number of Songs</th></tr></thead><tbody>";

    // output data of each row

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["MAX(songNumber)"] . "</td></tr>";
    }
    echo "</tbody></table>";

    echo "<br /><br />";

}

$conn->close();
?>
        </main>
    </div>
</body>

</html>