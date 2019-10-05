  <?php

    require('database.php');

   // create new user
   if($_SERVER['REQUEST_METHOD'] == "POST") {
    $size = $_POST["size"];
    $brand = $_POST["brand"];
    $product_name = $_POST["product_name"];
    $stock_qty = $_POST["stock_qty"];
    $store = $_POST["store"];
    $price = $_POST["price"];


    try{
       $statement = $pdo->prepare(
         "INSERT INTO inventory (size, brand, product_name, stock_qty, store, price) VALUES (:size, :brand, :product_name, :stock_qty, :store, :price);"
      );

       $statement->execute(['size' => $size, 'brand' => $brand, 'product_name' => $product_name, 'stock_qty' => $stock_qty, 'store' => $store, 'price' => $price]);
        echo "Insert Procuts: {$brand} {$product_name}";

        $id = $pdo->lastInsertId();

        echo "<script>location.href='./read.php?show=one&id={$id}'</script>";

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
      <form action="./create.php" method="POST">
        <label for="size">Size</label><br>
        <input type="text" name="size" value=""><br>
        <label for="brand">Brand</label><br>
        <input type="text" name="brand" value=""><br>
        <label for="product_name">Product Name</label><br>
        <input type="text" name="product_name" value=""><br>
        <label for="stock_qty">Stock Qty</label><br>
        <input type="text" name="stock_qty" value=""><br>
        <label for="store">Store</label><br>
        <input type="text" name="store" value=""><br>
        <label for="price">Price</label><br>
        <input type="text" name="price" value=""><br>
        <button type="submit">Save</button>
      </form>
    </body>

  </html>
