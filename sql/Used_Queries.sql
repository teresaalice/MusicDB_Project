/*  Projection Query  */

SELECT artistID, artistName FROM artist

/*  Selection Query  */

SELECT artistID, artistName FROM artist WHERE artistName = '$SArtist'

/* Join Query */

SELECT artist.artistName, album.albumTitle, album.releaseYear
FROM artist 
INNER JOIN artistAlbums ON artist.artistID=artistalbums.artistID 
INNER JOIN album ON album.albumID=artistalbums.albumId 
WHERE artistName = '$SArtist'

/* Division Query */

SELECT a.albumname FROM album a
WHERE albumId NOT IN (
SELECT albumId FROM (
(SELECT albumId, labelId FROM (SELECT labelname FROM label WHERE labelname='$LName')
AS l CROSS JOIN (SELECT DISTINCT essn from works_on) as w)
EXCEPT (SELECT essn, pno FROM works_on)) AS r );

/* Aggregation Query */

SELECT MIN(releaseYear)
FROM Album;

SELECT AVERAGE(songNumber)
from AlbumSongs;

/* Nested Aggregation with Group-By */

SELECT a.artistName, b.albumTitle, b.releaseYear
FROM artist a, artistAlbums ab , album b
WHERE a.artistID=ab.artistID AND b.albumID=ab.albumId IN
    (SELECT albumId
    HAVING MIN(b.releaseYear));
