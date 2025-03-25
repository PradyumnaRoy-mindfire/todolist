# TodoList Project

It is a simple todolist project made by following MVC architechture.


## Installation
* php 8.3
* Apache
* Composer
* Configure virtual host
    * ```bash
        sudo nano /etc/apache2/sites-available/mysite.conf
        ```
    * ``` bash
        <VirtualHost *:80>
            ServerAdmin webmaster@localhost
            ServerName mysite.local
            ServerAlias https://www.mysite.local
            DocumentRoot /var/www/mysite
            ErrorLog ${APACHE_LOG_DIR}/error.log
            CustomLog ${APACHE_LOG_DIR}/access.log combined
        </VirtualHost>
        ```
    * ```bash 
        sudo a2ensite mysite.conf
        ```
    * ```bash 
        sudo apache2ctl configtest
        ```
    * ```bash 
        sudo systemctl restart apache2
        ```
    * ```bash 
        sudo nano /etc/hosts
        127.0.0.1       mysite.local

        ```
    
## Features
 * User can add a task
 * They can modify it also 
 * Can delete a task too
 * Can mark it as complete 

## Code Description
 * Used MVC pattern that followed in the industry.
 * Created individual controllers for each features ,individual model for each table
 * Has a separate file for routes .
 * Implemented autoloader using composer .
 * Used class,object,inheritance and namespace concept and used PDO for database connection.
 * Utilized ajax in js , working all features without page reload.
 * Sent proper status code and json reponse where needed.
 * Shown a good UI.
 * Handled exception and Logger file to show errors and exception.
 * Used environmental variables.

## Tech Stack
**Client:** HTML, Bootstrap, CSS, JS
**Server:** PHP
**Database:** MySQL


## Author
- [Pradyumna Roy](https://github.com/PradyumnaRoy-mindfire/todolist)