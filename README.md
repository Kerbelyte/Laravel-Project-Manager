# Projects manager system

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>

This is my final project built with Laravel framework.
This project implements CRUD (Create, Read, Update, Delete) functionality.

## Deployment procedure:

1. Clone the repository;
2. Use XAMPP, AMPPS or other open-source platform to launch a php interpreter;
3. Create a new schema 'projects' in your DB;
4. Go to '.env.example' file and configure Database:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projects
DB_USERNAME=root
DB_PASSWORD='';

> *Note: DB_DATABASE field value should match the name of the schema.*
5. Rename '.env.example' file to '.env';
6. Execute comand `php composer.phar install`
7. Execute comand `php artisan key:generate`
8. Execute comand `php artisan migrate` to create tables in database;
9. Execute comand `php artisan db:seed` to add user;
10. Execute comand `php artisan serve` and follow the link that is generated;

## Launch procedure:

* Open the app in your browser:
**Log in information:**  
Username: admin
Password: admin123

## App allow:
* Create, Read, Update and Delete employees and projects;
* Add employees to projects/Add projects to employees;
* Remove employees from projects/Remove projects from employees;




## Author
Dovilė [Github](https://github.com/Kerbelyte) , [LinkedIn](https://linkedin.com/in/dovilė-kerbelytė-66634a162)
