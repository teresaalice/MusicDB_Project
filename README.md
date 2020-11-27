                    Community Music Database

This project consists in a database created in MySQL. It also provides a web GUI interface that can be used to check specific queries with data within the database. The GUI was programmed using HTML and CSS(Bootstrap).
Server name: localhost
Username: root
Password: root
Database: musicdb

The components and the minimum requirements are:
XAMPP v3.2.4
Web Browser


  Application installation instructions: 

After installing XAMPP, run the XAMPP Control Panel. Start Apache and MySQL services.

Extract this repository to /xampp/htdocs directory or change the root folder in \xampp\apache\conf\httpd.conf to the desired directory.

Go to https://localhost/phpmyadmin/ and create a new database called musicdb

Go to https://localhost/phpmyadmin/server_privileges.php?db=musicdb and change the password of root @ localhost to “root”.

Go to https://localhost/phpmyadmin/db_sql.php?db=musicdb and run the contents of the CREATE_Script_MusicDB.sql file.

In the same page, run the contents of the INSERT_Script_MusicDB.sql file.

Visit http://localhost/MusicDB_Project/src/ and test the queries.
