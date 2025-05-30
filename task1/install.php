<?php
require_once('config.php');
try{
    // *********connect to database 
    $conn = new PDO($dsn, $user , $password,$options);
    echo "connection successfully" ;

    // var_dump($conn);
 
    //********create users table in userdb

    $sql = "CREATE TABLE IF NOT EXISTS users(
        id INT UNSIGNED AUTO_INCREMENT  ,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL ,
       
        PRIMARY KEY(id)";

        $conn->exec($sql);
        echo "Table Created Successfully";

    // var_dump($sql);

}
catch(PDOException $e){
    echo"connection failed :".$e->getMessage();
}
   











?>