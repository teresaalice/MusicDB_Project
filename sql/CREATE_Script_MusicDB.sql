CREATE TABLE Artist(
    artistId INT AUTO_INCREMENT PRIMARY KEY,
    artistName VARCHAR(255) NOT NULL
); CREATE TABLE Label(
    labelId INT AUTO_INCREMENT PRIMARY KEY,
    labelName VARCHAR(255) NOT NULL
); CREATE TABLE Tag(
    tagId INT AUTO_INCREMENT PRIMARY KEY,
    tagName VARCHAR(255) NOT NULL UNIQUE
); CREATE TABLE Roles(
    roleId INT AUTO_INCREMENT PRIMARY KEY,
    roleName VARCHAR(255) NOT NULL UNIQUE
); CREATE TABLE registeredUsers(
    userId INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(15) NOT NULL UNIQUE,
    userEmail VARCHAR(255) NOT NULL UNIQUE
); CREATE TABLE Album(
    albumID INT AUTO_INCREMENT PRIMARY KEY,
    albumTitle VARCHAR(255) NOT NULL,
    releaseYear INT
); CREATE TABLE Song(
    songId INT AUTO_INCREMENT PRIMARY KEY,
    songtitle VARCHAR(255) NOT NULL
); CREATE TABLE ProducedBy(
    artistId INT,
    producerId INT,
    FOREIGN KEY(artistID) REFERENCES Artist(artistID) ON DELETE CASCADE,
    FOREIGN KEY(producerID) REFERENCES Artist(artistID) ON DELETE CASCADE,
    PRIMARY KEY(artistId, producerId)
); CREATE TABLE userRoles(
    userId INT,
    roleId INT,
    FOREIGN KEY(userId) REFERENCES registeredUsers(userId) ON DELETE CASCADE,
    FOREIGN KEY(roleId) REFERENCES Roles(roleId) ON DELETE CASCADE,
    PRIMARY KEY(userId, roleId)
); CREATE TABLE artistTags(
    tagId INT,
    artistId INT,
    FOREIGN KEY(tagId) REFERENCES Tag(tagId) ON DELETE CASCADE,
    FOREIGN KEY(artistId) REFERENCES Artist(artistId) ON DELETE CASCADE,
    PRIMARY KEY(tagId, artistId)
); CREATE TABLE songTags(
    tagId INT,
    songId INT,
    FOREIGN KEY(tagId) REFERENCES Tag(tagId) ON DELETE CASCADE,
    FOREIGN KEY(songId) REFERENCES Song(songId) ON DELETE CASCADE,
    PRIMARY KEY(tagId, songId)
); CREATE TABLE albumTags(
    tagId INT,
    albumId INT,
    FOREIGN KEY(tagId) REFERENCES Tag(tagId) ON DELETE CASCADE,
    FOREIGN KEY(albumId) REFERENCES Album(albumId) ON DELETE CASCADE,
    PRIMARY KEY(tagId, albumId)
); CREATE TABLE albumLabel(
    albumId INT,
    labelId INT,
    FOREIGN KEY(albumId) REFERENCES Album(albumId) ON DELETE CASCADE,
    FOREIGN KEY(labelId) REFERENCES Label(labelId) ON DELETE CASCADE,
    PRIMARY KEY(albumId, labelId)
); CREATE TABLE artistSongs(
    artistId INT,
    songId INT,
    FOREIGN KEY(artistId) REFERENCES Artist(artistId) ON DELETE CASCADE,
    FOREIGN KEY(songId) REFERENCES Song(songId) ON DELETE CASCADE,
    PRIMARY KEY(artistId, songId)
); CREATE TABLE artistAlbums(
    artistId INT,
    albumId INT,
    FOREIGN KEY(artistId) REFERENCES Artist(artistId) ON DELETE CASCADE,
    FOREIGN KEY(albumId) REFERENCES Album(albumId) ON DELETE CASCADE,
    PRIMARY KEY(artistId, albumId)
); CREATE TABLE albumSongs(
    albumId INT,
    songId INT,
    songNumber INT,
    FOREIGN KEY(albumId) REFERENCES Album(albumId) ON DELETE CASCADE,
    FOREIGN KEY(songId) REFERENCES Song(songId) ON DELETE CASCADE,
    PRIMARY KEY(albumId, songId)
);