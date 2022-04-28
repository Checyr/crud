#  Difference between Connection MySQLi and PDO

Exist a lot of ways to do connections with the database the MySQLi type accept only MySQL databases
but PDO accept more than 12 types.


## Doing the connection

For doing the connection we need

1. to set variable with the values of
   o kinda url of the server the user, password and the name of the database
   for the user we can use "root" because we are not deploying this on a cloud server
   and the password if you don't set anything for the user root you can just set empty.

2. Set PDO instantiated using new and put the PDO() after and between the parameters put the name the type of the database EX: mysql and put ":"host=and_the_variableserver;dbname=name_database,user,password;

~~~php
    $pdo = new PDO("mysql:host=$server;dbname=$banco",$usuario,$senha);
~~~    

> NOTE: If you get problems with pdo try put in a try and catch functions, so you can check what is the problem


## Creating a table using PDO

Before we create a table we need to know that every item on a table have an id we need to set the keys of the parameters
create a new variable and put she equal to "$pdo" pdo because it was the name of our variable to connect with the database,
and it's just put an Object called query that is the queries from the MySQL and pass the MySQL query.

~~~php
   try {
      $sql = $pdo->query("CREATE TABLE IF NOT EXISTS clients (
      id INT auto_increment NOT NULL PRIMARY KEY,
      first_name VARCHAR(100) NOT NULL,
      email VARCHAR(50) NULL,
      datinha DATE NULL)");
   }catch(PDOException $ex){
      echo "Something went wrong" . $ex->getMessage();
   }
~~~

Basically this block of code are saying that if a table called clients doesn't exist you create her with this
columns called id, first_name, email, datinha and if something went wrong the program go to the catch and pass
the error.




