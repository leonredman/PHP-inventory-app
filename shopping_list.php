<?php

  require('database.php');
  initMigration($pdo);

  if($_SERVER['REQUEST_METHOD'] == "GET") {
  try{
    $statement = $pdo->prepare(
      'SELECT * FROM inventory WHERE stock_qty = 0;'
    );
    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_OBJ);

  } catch(PDOException $e){
    echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
  }
}
 ?>

 <html>
   <head>
     <link rel="stylesheet" href="./css/styles.css">
     <title>Culinary Closet Inventory Managemt</title>
   </head>

   <body>
     <!-- menu -->
       <a href="./create.php">Create Inventory</a>
       <br>
       <br>
       <a href="/">Show All Inventory</a>
       <br>
       <br>
       <a href="./shopping_list.php">Current Shopping List</a>
       <br>
       <br>
     <!-- end menu -->

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
         <a href="./update.php?id=<?php echo $inventory->id; ?>">edit</a>
       </td>
       <td>
         <a href="./delete.php?id=<?php echo $inventory->id; ?>" onclick="confirm()">delete</a>
       </td>
     </tr>

     <?php } ?>
   </body>
 </html>
