## About This App

This is simple test app, the prerequisite of this app requires:
- [Composer](https://getcomposer.org/) - PHP dependencies manager
- [npm](https://getcomposer.org/) - JS dependencies manager, download through node.js
- [MySQL](https://www.mysql.com/downloads/) server listening on port 3306

- PHP 7.3 or above

- set Composer, Npm, PHP in global environment variable


## Important Before Build steps
1. MySQL should listen on port 3306 on default.

2. make sure to create an account in MySQL database, the user name should be 'root', password should be 'mysql'. Grant all privileges 

3. create an database named 'test'.
otherwise, need to edit '.env' file to change the database connection setting.

## Building steps

1. composer install (install all PHP dependencies)
2. npm install (install JS dependencies)
3. npm run watch (webpack mix)
4. php artisan migrate (create database tables)
5. php artisan storage:link (create sybolic link)
6. php artisan serve (start local testing server on port 8000)

The local testing server will run on port 8000 with http.
Access in browser "http://127.0.0.1:8000"
