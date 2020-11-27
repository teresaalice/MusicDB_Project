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
        <main>
            <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "musicdb";
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
    echo "<br/>";
    echo "<h3 align=\"center\">Artist Search Result</h3>";
    echo "<br /><br />";
    echo "<table class=\"table table-striped\" align=\"center\">";

    echo "<tr><th>Artist ID</th><th>Artist Name</th></tr>";
    // output data of each row

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["artistID"] . "</td><td> " . $row["artistName"] . "</td></tr></table>";
    }
} else {
    $query = "SELECT artistID, artistName FROM artist";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<br/>";

        echo "<h3 align=\"center\">Artist Search Result</h3>";
        echo "<br /><br />";
        echo "<table class=\"table table-striped\" align=\"center\">";

        echo "<tr><th>Artist ID</th><th>Artist Name</th></tr>";
        // output data of each row

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["artistID"] . "</td><td> " . $row["artistName"] . "</td></tr>";
        }

        echo "</table>";

    }
}
$conn->close();
?>
        </main>
    </div>
</body>

</html>