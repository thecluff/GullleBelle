# Gull le Belle

A fake banking website for scambaiting

## How to use
1. Install [XAMPP](https://www.apachefriends.org/index.html).
2. Download [GullleBelle-master.zip](https://github.com/lahrence/GullleBelle/archive/master.zip).
3. Go to `C:\xampp\htdocs` (or wherever the htdocs folder is) and delete all the files/folders.
4. Unzip the `GullleBelle-master.zip` and drag the folder into the folder.
5. In the XAMPP control panel, start 'MySQL'.
6. Go to [phpmyadmin](http://localhost/phpmyadmin/) (this link will only work if you have MySQL started).
7. Create a new database called 'gulllebelle'.
8. After the database is created, go to the SQL tab and copy this into the text area.```CREATE TABLE `users` (
  'idUsers' int(11) AUTO_INCREMENT KEY NOT NULL,
  'uidUsers' tinytext NOT NULL,
  'emailUsers' tinytext NOT NULL,
  'pwdUsers' longtext NOT NULL,
  'chckAcc' decimal(18,2) DEFAULT NULL,
  'savAcc' decimal(18,2) DEFAULT NULL,
  'credits' decimal(18,2) DEFAULT NULL,
  'chckNum' tinytext NOT NULL,
  'savNum' tinytext NOT NULL,
  'credNum' tinytext NOT NULL
)``` Click go.
9. 