  <?php

    require('database.php');
      // POST
      // GET
      //PUT
      //DELETE

   // HANDLES  POST request
   if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET["id"]) && $_POST["_method"] == "PUT") {
    $size = $_POST["size"];
    $brand = $_POST["brand"];
    $product_name = $_POST["product_name"];
    $stock_qty = $_POST["stock_qty"];
    $store = $_POST["store"];
    $price = $_POST["price"];
    $id = $_GET["id"];

    try{
      $statement = $pdo->prepare(
        'UPDATE inventory SET size = :size, brand = :brand, product_name = :product_name, stock_qty = :stock_qty, store = :store, price = :price where id = :id');
        $statement->execute(["size" => $size, "brand " => $brand , "product_name" => $product_name, "stock_qty" => $stock_qty, "store " => $store , "price" => $price, "id" => $id]);
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
      <title>Culinary Closet Inventory Managemt</title>
    </head>

    <body>
      <form action="./update.php?id=<?php echo $results[0]->id; ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <label for="size">Size</label><br>
        <input type="text" name="size" value="<?php echo $results[0]->size; ?>"><br>
        <label for="brand">Brand</label><br>
        <input type="text" name="brand" value="<?php echo $results[0]->brand; ?>"><br>
        <label for="product_name">Product Name</label><br>
        <input type="text" name="product_name" value="<?php echo $results[0]->product_name; ?>"><br>
        <label for="stock_qty">Stock Qty</label><br>
        <input type="text" name="stock_qty" value="<?php echo $results[0]->stock_qty; ?>"><br>
        <label for="store">Store</label><br>
        <input type="text" name="store" value="<?php echo $results[0]->store; ?>"><br>
        <label for="price">Price</label><br>
        <input type="text" name="price" value="<?php echo $results[0]->price; ?>"><br>
        <button type="submit">Save</button>
      </form>
      <a href="/">Go Back</a>
    </body>

  </html>
