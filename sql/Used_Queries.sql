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

SELECT tagName
FROM tag AS t
WHERE NOT EXISTS(
(SELECT a.albumId
FROM album AS a)
EXCEPT
(SELECT atags.albumId FROM albumtags AS atags WHERE atags.tagId = t.tagId));

/* Aggregation Query */

SELECT MIN(releaseYear)
FROM Album;

SELECT MAX(songNumber)
FROM albumsongs;


/* Nested Aggregation with Group-By */

SELECT AVG(songs.max)
FROM ( SELECT MAX(songNumber)as max FROM albumsongs group by albumId)songs;

/* Delete Query */

DELETE FROM artist WHERE artistname = '$AName'

/* Update Query */

UPDATE album
SET releaseYear = '$NewYear'
WHERE albumTitle = '$AName'; 
