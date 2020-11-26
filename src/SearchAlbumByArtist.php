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
            <h1>MusicDB_Project - Join Query</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.html">Index</a></li>
                <li><a href="InsertArtist.html">Insert Artist</a></li>
                <li>
                    <a href="SearchArtist.html">Search Artist - Select/Projection Query</a>
                </li>
                <li>
                    <a href="SearchAlbumByArtist.html">Search Album By Artist - Join Query</a>
                </li>
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
$query = "SELECT artist.artistName, album.albumTitle, album.releaseYear
FROM artist
INNER JOIN artistAlbums ON artist.artistID=artistalbums.artistID
INNER JOIN album ON album.albumID=artistalbums.albumId
WHERE artistName = '$SArtist'";
//Execute the query
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<h1>Album Search Result</h1>";
    echo "<br /><br />";
    echo "<table align=\"center\"border= \"1\">";
    echo "<tr><th>Artist</th><th>Album Name</th><th>Release Year</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["artistName"] . "</td><td> " . $row["albumTitle"] . "</td><td> " . $row["releaseYear"] . "</td></tr>";
    }
    echo "</table>";
} else {
    $query = "SELECT artistName, albumName, releaseYear FROM album, artist WHERE album.artistId = artist.artistId";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<h1>Album Search Result</h1>";
        echo "<br /><br />";
        echo "<table align=\"center\"border= \"1\">";
        echo "<tr><th>Album Id</th><th>Album Name</th><th>Release Year</th></tr>";
        // output data of each row

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["albumId"] . "</td><td> " . $row["albumTitle"] . "</td><td> " . $row["releaseYear"] . "</td></tr>";
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