  <?php

    require('database.php');

   // create new user
   if($_SERVER['REQUEST_METHOD'] == "POST") {
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


    try{
       $statement = $pdo->prepare(
         "INSERT INTO inventory (category, item, brand, type, unit, size, expiration_date, stock_qty,
            store_location, price) VALUES (:category, :item, :brand, :type, :unit, :size, :expiration_date, :stock_qty, :store_location, :price);"
      );

       $statement->execute(['category' => $category, 'item' => $item, 'brand' => $brand, 'type' => $type, 'unit' => $unit,
        'size' => $size, 'expiration_date' => $expiration_date,
        'stock_qty' => $stock_qty, 'store_location' => $store_location, 'price' => $price]);
        echo "Insert Products: {$brand} {$type}";

        $id = $pdo->lastInsertId();

        echo "<script>location.href='./read.php?show=one&id={$id}'</script>";

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

      <title>Culinary Closet Inventory Mgmt</title>
    </head>
    <body>
      <form action="./create.php" method="POST">

        <label for="category">category</label><br>
        <input type="text" name="category" value=""><br>

        <label for="item">Item</label><br>
        <input type="text" name="item" value=""><br>

        <label for="brand">Brand</label><br>
        <input type="text" name="brand" value=""><br>

        <label for="type">Type</label><br>
        <input type="text" name="type" value=""><br>

        <label for="unit">Unit</label><br>
        <input type="text" name="unit" value=""><br>

        <label for="size">Size</label><br>
        <input type="text" name="size" value=""><br>

        <label for="expiration_date">Expiration Date</label><br>
        <input type="text" name="expiration_date" value=""><br>

        <label for="stock_qty">Stock Qty</label><br>
        <input type="text" name="stock_qty" value=""><br>

        <label for="store_location">Store Location</label><br>
        <input type="text" name="store_location" value=""><br>

        <label for="price">Price</label><br>
        <input type="text" name="price" value=""><br>

        <button type="submit">Save</button>
      </form>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

  </html>
