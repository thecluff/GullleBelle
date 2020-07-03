# Gull le Belle

A fake banking website for scambaiting

## How to use
1. Install [XAMPP](https://www.apachefriends.org/index.html)
2. Download [GullleBelle-master.zip](https://github.com/lahrence/GullleBelle/archive/master.zip)
3. Unzip the file and drag the folder to `C:\xampp\htdocs` (or wherever the htdocs folder is)
4. In the XAMPP control panel, start 'MySQL'
5. Go to [phpmyadmin](http://localhost/phpmyadmin/)
7. ```CREATE TABLE `users` (
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
)```