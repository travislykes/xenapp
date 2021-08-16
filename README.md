# xenapp

The Application was developed with ddev/docker
A sample of the database can be found in config/db.sql

To start project in the docker environment

Run ddev config to setup the application

After the initial setup 
Run ddev composer install to install all required dependencies

The backup databbase can bbe imported with the command below

ddev import-db --src=config/db.sql

To create the demo user run
php -f config/UserSeed.php

if your current PHP version cannot run the command, ssh into the container with (ddev ssh) and run the command


Packages used in developement
Blade
SteamPixel Simple Router
