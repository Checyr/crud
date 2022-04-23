#  Difference between Connection MySQLi and PDO

Exist a lot of ways to do connections with the database the MySQLi type accept only MySQL databases
but PDO accept more than 12 types 


## Doing the connection

For doing the connection we need

1. to set variable with the values of
   o kinda url of the server the user, password and the name of the database
   for the user we can use "root" because we are not deploying this on a cloud server
   and the password if you don't set anything for the user root you can just set empty

2. Set PDO instantiated using new and put the PDO() after and between the parameters put the name the type of the dabase EX: mysql and put ":"host=and_the_variableserver;dbname=name_database,user,password;

~~~php
$pdo = new PDO("mysql:host=$server;dbname=$banco",$usuario,$senha);
~~~    
