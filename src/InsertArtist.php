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
    <div id="wrapper">
        <header>
            <h1>MusicDB_Project - Insert Query</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.html">Index</a></li>
                <li><a href="Insert.html">Insert Artist</a></li>
                <li>
                    <a href="SearchArtist.html">Search Artist - Select/Projection Query</a>
                </li>
                <li>
                    <a href="SearchAlbumByArtist.html">Search Album By Artist - Join Query</a>
                </li>
            </ul>
        </nav>
        <main>

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
    echo "New record created successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
        </main>
    </div>
</body>

</html>