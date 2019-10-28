<?php


  require('database.php');
  initMigration($pdo);

  $keywordfromform = $_GET["keyword"];


   if($_SERVER['REQUEST_METHOD'] == "GET") {
     try{
   $statement = $pdo->prepare(

     // "SELECT * FROM inventory WHERE item LIKE '%" . $keywordfromform . "%' ORDER BY id DESC"
     "SELECT * FROM inventory WHERE item LIKE '%" . $keywordfromform . "%'
    OR brand LIKE '%" . $keywordfromform . "%'
    OR type LIKE '%" . $keywordfromform . "%'
    ORDER BY id DESC"
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

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <!-- <link rel="stylesheet" href="./css/styles.css"> -->
     <title>Culinary Closet Inventory Managemt</title>
   </head>

   <body>

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

    <form action="search.php" method="get">
     <label>
       Search Products
       <input type="text" name="keyword" autocomplete="off">
     </label>

     <input type="submit" value="Submit">
   </form>
   <br> <br>
 <!-- search form  end-->
 <table class="table table-hover">
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
      <a href="./update.php?id=<?php echo $inventory->id; ?>">edit</a>
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
