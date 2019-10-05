  <?php

    require('database.php');

   // create new user
   if($_GET["show"] == "all") {
     try{
       $statement = $pdo->prepare(
         'SELECT * FROM inventory;'
       );
       $statement->execute();

       $results = $statement->fetchAll(PDO::FETCH_OBJ);
       echo "Read from table users</br>";
     } catch(PDOException $e){
      echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
     }

   }  if($_GET["show"] == "one" && isset($_GET["id"])) {
        $id = $_GET["id"];
     try{
       $statement = $pdo->prepare(
         'SELECT * FROM inventory where id = :id;'
       );
       $statement->execute(["id" => $id]);

       $results = $statement->fetchAll(PDO::FETCH_OBJ);
       echo "Read from table inventory</br>";
     } catch(PDOException $e){
      echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
     }
   }

  ?>

  <html>

    <head>
      <link rel="stylesheet" href="./css/styles.css">
      <title>Culinary Closet Inventory Mgmt</title>
    </head>

    <body>
      <table>
        <tr>
            <th>id</th>
            <th>size</th>
            <th>brand</th>
            <th>product_name</th>
            <th>stock_qty</th>
            <th>store</th>
            <th>price</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
      <?php foreach($results as $inventory) { ?>
        <tr>
          <td><?php echo $inventory->id; ?></td>
          <td><?php echo $inventory->size; ?></td>
          <td><?php echo $inventory->brand; ?></td>
          <td><?php echo $inventory->product_name; ?></td>
          <td><?php echo $inventory->stock_qty; ?></td>
          <td><?php echo $inventory->store; ?></td>
          <td><?php echo $inventory->price; ?></td>
          <td>
          <td><a href="./update.php?id=<?php echo $inventory->id; ?>">edit</a>
          </td>
          <td>
            <a href="./delete.php?id=<?php echo $inventory->id; ?>" onclick="confirm()">delete</a>
          </td>
      </tr>

      <?php } ?>
    </table>
    </body>
  </html>
