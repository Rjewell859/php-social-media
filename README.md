# Advantage Social

## CIS224 Final Project
- Student Name: Ryan Jewell
- Date: 5/3/23
    
### Table of Content
[Description](#description)
[Installation](#installation)    
[Usage](#usage)
[Contact](#contact)

### Description

This project is a the front and back end code for a social media api. I have utilized PHP, js, html, and css to create this project. It utilizes a mySQL database using apache as a webserver. Some extra features include bootstrap and justValidate. It is a very simplistic approach not involving user interaction but allows for the creation/deletion of accounts, viewing profile including an uploaded image and log in functionality. Passwords are hashed using the built in php password_hash() function. The database will dynamically update and change based on the adding and removal of accounts. Client side and server side validation has been implemented as well as simple html form validation to ensure that all the bases have been covered.

### Installation

* In order to use this application you must have xampp with apache and mySQL running from the xampp control panel.
* The folder must be placed in the proper htdocs folder to run. ("C:\xampp\htdocs" by default) 
* For ease of use, rename the folder with the repositories contents.   
* Viewing the website is done by navigating to localhost/'your-folder-name-here' in the web browser.
* It is important to run the 'createdb.php' file initially to initialize the login database and user table. This is done by navigating to 
"localhost/'your-folder-name'/php/createdb.php". Note that this only has to be done once unless your intention is to empty the whole database.
* The user experience begins in '/html/index.html', a link is provided after succesfully running createdb.php.
* Important note: You will need to make a change in createdb.php and database.php where I have set the port to 4306 to ensure the proper database port is utilized. Excluding the port number will connect to the default of 3306.


### Usage

Create a user account and use phpmyadmin to verify that the user has been added to the user table in login_db. 
View the account contents by logging in. 
Verify the log out link functions properly.
Confirm that when deleting an account, the respective user has been removed from the database with phpmyadmin.
See that the image submitted on signup has it's path stored in login_db, is stored in /images, and appears on the profile page.
   
#### Contact

See my repositories at [Github Profile](https://github.com/rjewell859)

Email me with additional questions at headwallforest27@gmail.com
