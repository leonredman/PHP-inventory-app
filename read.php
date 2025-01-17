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

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/styles.css">

      <title>Weable Inventory Managemt</title>
    </head>

    <body>

      <table>
        <tr>
          <th>id</th>
          <th>category</th>
          <th>item</th>
          <th>brand</th>
          <th>type</th>
          <th>unit</th>
          <th>size</th>
          <th>expiration_date</th>
          <th>stock_qty</th>
          <th>store_location</th>
          <th>price</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      <?php foreach($results as $inventory) { ?>
        <tr>
          <td><?php echo $inventory->id; ?></td>
          <td><?php echo $inventory->category; ?></td>
          <td><?php echo $inventory->item; ?></td>
          <td><?php echo $inventory->brand; ?></td>
          <td><?php echo $inventory->type; ?></td>
          <td><?php echo $inventory->unit; ?></td>
          <td><?php echo $inventory->size; ?></td>
          <td><?php echo $inventory->expiration_date; ?></td>
          <td><?php echo $inventory->stock_qty; ?></td>
          <td><?php echo $inventory->store_location; ?></td>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
  </html>
