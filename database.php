<?php

// Database connection
// added port=8889 for mamp local server

function connectDB(){

  try {

    $database = new PDO('mysql:host=localhost;dbname=inventory', 'root', 'root');
    $database->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h4 style='color: green;'>Connected to database</h4>";
    return $database;
  } catch(PDOException $e){
    echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
  }
}

  $pdo = connectDB();

  function initMigration($pdo){

    try{
      $statement = $pdo->prepare(
        'CREATE TABLE IF NOT EXISTS inventory (
          id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
          category varchar(255) NOT NULL,
          item varchar(255) NOT NULL,
          brand varchar(255) NOT NULL,
          type varchar(255) NOT NULL,
          unit varchar(255) NOT NULL,
          size varchar(255) NOT NULL,
          expiration_date varchar(255) NOT NULL,
          stock_qty int NOT NULL,
          store_location varchar(255) NOT NULL,
          price int NOT NULL
        );'
      );
      $statement->execute();
    } catch(PDOException $e){
      echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
    }
  }
?>
