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
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link rel="stylesheet" href="./css/styles.css">
     <title>Weable Inventory Managemt</title>
   </head>

   <body>
     <div class="d-flex flex-row">
           <div class="col-2 p-3 mb-2 text-white text-center" id="aside">
             <div class="logo">
               <img src="./images/logo_trans2.png">
                 <h5>WEABLE INVENTORY</h5>
             </div>

                 <!-- menu -->
                 <div class="aside-menu">





                   <h6>Dashboard</h6>

     <!-- menu -->
     <a href="./create.php" class="text-secondary">Create Inventory</a>
     <br>
     <br>
     <a href="/" class="text-secondary">All Inventory</a>
     <br>
     <br>
     <a href="./shopping_list.php" class="text-secondary">Shopping List</a>
     <br>
     <br>
     <!-- <a href="./search.php" class="text-secondary">Search Products</a> -->
     <a href="/">Go Back</a>
   <!-- end menu -->

 </div>
</div>

<div>
<div class="menu-bar">


</div>
<br>
 <!-- search form -->
 <div class="search-form">
     <h4> Shopping List</h4>
     <br> <br>
 <form action="search.php" method="get">
   <label>
     Search Products
     <input type="text" name="keyword" autocomplete="off">
   </label>

   <input type="submit" class="btn text-light" value="Submit">
 </form>
   </div>
   <br>
 <!-- search form  end-->
 <div class="row-seperator">

 </div>



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
