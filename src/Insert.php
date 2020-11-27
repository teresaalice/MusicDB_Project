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

        <?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "musicdb";
// Getting values
$AName = $_POST['artistName'];
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//construct the query
$query = "INSERT INTO artist(artistname) VALUES('$AName')";
//Execute the query
if ($conn->query($query) === true) {
    echo "New record created successfully! Check the select page to confirm the changes.";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
        </main>
    </div>
</body>

</html>