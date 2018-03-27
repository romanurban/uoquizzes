# Multiple choice quizz app

## App built using
* MySQL
* PHP7 JSON API
* Vue.js
* Bootstrap

App allows to register any number of multiple question - multiple choice answer quzzes, complete them, check the solution and log the results in db.
Test, question and answer tables are not loose-coupled, so you are able to create various combinations of quizzes by reusing them.

N.B. only absolute answer match is considered as correct!

## Prerequsites
* MySQL or mariaDB
* PHP7 and pdo_mysql
* Apache2 with rewrite, php7.0, mpm_prefork mods enabled

## How to deploy
- Clone the repository: git clone https://github.com/romanurban/uoquizzes
- Create db from you priveleged user: mysql -h <host> -u <username> -p < [dbstruct.sql](sql/dbstruct.sql)
- Import the demo data: mysql -h <host> -u uoquizzesapp -puoquizzespasswd uoquizzes < [demodata.sql](sql/demodata.sql)
- Copy uoquizzes/ into your www root
- Navigate your browser to the 'localhost/client/'

For testing means -correct sample answers are located in [demodata.sql](sql/demodata.sql)
Log entries would be stored in repsonse_log and results tables.
