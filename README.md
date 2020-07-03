# Gull le Belle

A fake banking website for scambaiting copied as close to Kitboga's , "Gull and Bull", as possible.

## Features
* Fake bank account sign up
* Transfer between accounts
* Disable inspect on account information page (still accessible through other pages)
* Session inactivity timeout (15 minutes)
* Coo!

## Features to add
* Recent activities
* Transfer balance to other users
* Any other features I can think of

## How to use
### This instruction is for windows users, although the steps are mostly the same.
1. Install [XAMPP](https://www.apachefriends.org/index.html).
2. Download [GullleBelle-master.zip](https://github.com/lahrence/GullleBelle/archive/master.zip).
3. Go to `C:\xampp\htdocs` (or wherever your htdocs folder is) and delete all the files/folders.
4. Unzip the `GullleBelle-master.zip` and drag the folder into the htdocs folder.
5. In the XAMPP control panel, start 'MySQL'.
6. Go to [phpmyadmin](http://localhost/phpmyadmin/) (this link will only work if you have MySQL started).
7. Create a new database called 'gulllebelle'.
8. After the database is created, go to the SQL tab and copy this into the text area.
```
CREATE TABLE `users` (
  `idUsers` int(11) AUTO_INCREMENT KEY NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `chckAcc` decimal(18,2) DEFAULT NULL,
  `savAcc` decimal(18,2) DEFAULT NULL,
  `credits` decimal(18,2) DEFAULT NULL,
  `chckNum` tinytext NOT NULL,
  `savNum` tinytext NOT NULL,
  `credNum` tinytext NOT NULL
)
```
9. Click go.
10. Go to `C:\Windows\System32\drivers\etc` and open `hosts` with notepad.
11. Add this text to the end of it and save. 
```
127.0.0.1       www.gulllebelle.com
127.0.0.1       gulllebelle.com
```
12. Go to `(Your Xampp folder)\apache\conf\extra` and open `httpd-vhosts.conf`  (Replace `(Your Xampp folder)` with your Xampp folder).
13. Add this text to the end of it and save.
````
<VirtualHost *:80>
    ServerAdmin webmaster@gulllebelle
    DocumentRoot "(Your Xampp folder)/htdocs/gulllebelle"
    ServerName www.gulllebelle.com
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin webmaster@gulllebelle
    DocumentRoot "(Your Xampp folder)/htdocs/gulllebelle"
    ServerName gulllebelle.com
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>
````  
(Replace `(Your Xampp folder)` with your Xampp folder).

14. Start Apache in the XAMPP control panel.
15. Go to www.gulllebelle.com (this link only works on your computer) and you're done!

## Warning!!
Do not publish this! Not because I don't want you to, but you might get in trouble for starting a fake bank website.