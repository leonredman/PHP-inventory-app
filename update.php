  <?php

    require('database.php');
      // POST
      // GET
      //PUT
      //DELETE

   // HANDLES  POST request
   if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET["id"]) && $_POST["_method"] == "PUT") {
     $category = $_POST["category"];
     $item = $_POST["item"];
     $brand = $_POST["brand"];
     $type = $_POST["type"];
     $unit = $_POST["unit"];
     $size = $_POST["size"];
     $expiration_date = $_POST["expiration_date"];
     $stock_qty = $_POST["stock_qty"];
     $store_location = $_POST["store_location"];
     $price = $_POST["price"];
    $id = $_GET["id"];

    try{
      $statement = $pdo->prepare(
        'UPDATE inventory SET category = :category, item = :item, brand = :brand, type = :type, unit = :unit, size = :size, expiration_date = :expiration_date, stock_qty = :stock_qty, store_location = :store_location, price = :price where id = :id');
        $statement->execute(['category' => $category, 'item' => $item, 'brand' => $brand, 'type' => $type, 'unit' => $unit,
         'size' => $size, 'expiration_date' => $expiration_date, 'stock_qty' => $stock_qty, 'store_location' => $store_location, 'price' => $price]);
        echo "updated the data";
     } catch(PDOException $e){
      echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
     }
   }

  // responsible for GET request
   if(isset($_GET["id"])){
     $id = $_GET["id"];

     try{
       $statement = $pdo->prepare(
         'SELECT * FROM inventory where id = :id;'
       );
       $statement->execute(["id" => $id]);

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
      <form action="./update.php?id=<?php echo $results[0]->id; ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">

        <label for="category">Category</label><br>
        <input type="text" name="category" value="<?php echo $results[0]->category; ?>"><br>

        <label for="item">Item</label><br>
        <input type="text" name="item" value="<?php echo $results[0]->item; ?>"><br>

        <label for="brand">Brand</label><br>
        <input type="text" name="brand" value="<?php echo $results[0]->brand; ?>"><br>

        <label for="type">Type</label><br>
        <input type="text" name="type" value="<?php echo $results[0]->type; ?>"><br>

        <label for="unit">Unit</label><br>
        <input type="text" name="unit" value="<?php echo $results[0]->unit; ?>"><br>

        <label for="size">Size</label><br>
        <input type="text" name="size" value="<?php echo $results[0]->size; ?>"><br>

        <label for="expiration_date">Expiration Date</label><br>
        <input type="text" name="expiration_date" value="<?php echo $results[0]->expiration_date; ?>"><br>

        <label for="stock_qty">Stock Qty</label><br>
        <input type="text" name="stock_qty" value="<?php echo $results[0]->stock_qty; ?>"><br>

        <label for="store_location">Store Location</label><br>
        <input type="text" name="store_location" value="<?php echo $results[0]->store_location; ?>"><br>

        <label for="price">Price</label><br>
        <input type="text" name="price" value="<?php echo $results[0]->price; ?>"><br>
        <button type="submit">Save</button>
      </form>
      <a href="/">Go Back</a>
    </body>

  </html>
