# Gull le Belle

A fake banking website for scambaiting copied as close to Kitboga's , "Gull and Bull", as possible.

## Disclaimer
Please only use this for scambaiting or personal means that do not hurt anyone. Do not publish this anywhere, keep it on your computer or VM only. The government knows each and everything.

## Features
* Fake bank account sign up
* Transfer between accounts
* Disabled inspect on account information page (still accessible through other pages)
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
5. Rename the folder to `GullleBelle` instead of `GullleBelle-master`.
6. In the XAMPP control panel, start 'MySQL' and 'Apache'.
7. Go to [phpmyadmin](http://localhost/phpmyadmin/) (this link will only work if you have MySQL started).
8. Create a new database called 'gulllebelle'.
9. After the database is created, go to the SQL tab and copy this into the text area.
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
10. Click go.
11. Go to `C:\Windows\System32\drivers\etc` and open `hosts` with notepad.
12. Add this text to the end of it and save. 
```
127.0.0.1       www.gulllebelle.com
127.0.0.1       gulllebelle.com
```
13. Go to `C:\xampp\apache\conf\extra` and open `httpd-vhosts.conf`  (Replace `C:/xampp` with where your xampp folder is if the location is different).
14. Add this text to the end of it and save.
````
<VirtualHost *:80>
    ServerAdmin webmaster@gulllebelle
    DocumentRoot "C:/xampp/htdocs/gulllebelle"
    ServerName www.gulllebelle.com
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin webmaster@gulllebelle
    DocumentRoot "C:/xampp/htdocs/gulllebelle"
    ServerName gulllebelle.com
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>
````  
(Replace `(Your Xampp folder)` with your Xampp folder).

15. Retart 'MySQL' and 'Apache' in the XAMPP control panel.
16. Go to www.gulllebelle.com (this link only works on your computer) and you're done!