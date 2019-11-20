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
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/styles.css">
      <title>Weable Inventory Managemt</title>
    </head>

    <body>

      <div class="d-flex flex-row">
          <div class="col-2 p-3 mb-2 text-white text-center" id="create-aside">
              <div class="logo">
                <img src="./images/logo_trans2.png">
                  <h5>WEABLE INVENTORY</h5>
              </div>

                <!-- menu -->
                <div class="aside-menu">
                  <h6>Dashboard</h6>
                    <a href="./create.php" class="text-secondary">Create Inventory</a>
                    <br><br>
                    <a href="/" class="text-secondary">All Inventory</a>
                    <br><br>
                    <a href="./shopping_list.php" class="text-secondary">Shopping List</a>
                    <br><br>
                    <!-- <a href="./search.php" class="text-secondary">Search Products</a> -->
                    <a href="/">Go Back</a>
                </div>
                <!-- end menu -->
          </div>

        <div>
                  <div class="menu-bar"></div>
                  <br></br>

                 <!-- search form -->
                  <div class="search-form">
                      <h4> Create Inventory</h4>
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
                 <!-- search end -->
                  <div class="row-seperator"></div>
                <br><br>

      <form class="form  ml-4 pl-4" action="./create.php" method="POST">

        <!-- <label for="category">category</label><br>
        <input type="text" name="category" value=""><br> -->

        <label for="category">category</label><br>
        <select name="category">
          <option value="Beverages">Beverages</option>
          <option value="Cereal/Breakfast">Cereal/Breakfast</option>
          <option value="Condiments/Oils">Condiments/Oils</option>
          <option value="Cleaning Supplies">Cleaning Supplies</option>
          <option value="Dairy">Dairy</option>
          <option value="Frozen">Frozen</option>
          <option value="Fruits">Fruits</option>
          <option value="Fish">Fish</option>
          <option value="Grains">Grains</option>
          <option value="Meat">Meat</option>
          <option value="Paper Goods">Paper Goods</option>
          <option value="Poultry">Poultry</option>
          <option value="Snacks">Snacks</option>
          <option value="Veggies">Veggies</option>
        </select>

        <br>
        <br>

          <div class="row">
              <div class="col-4">
                <label for="item">Item</label><br>
                <input type="text" name="item" value=""><br>
              </div>

              <div class="col-4">
                <label for="brand">Brand</label><br>
                <input type="text" name="brand" value=""><br>
              </div>

              <div class="col-4">
                <label for="type">Type</label><br>
                <input type="text" name="type" value=""><br>
              </div>
          </div>

            <br>

          <div class="row">
              <div class="col-4">
                <label for="unit">Unit</label><br>
                <input type="text" name="unit" value=""><br>
              </div>

              <div class="col-4">
                <label for="size">Size</label><br>
                <input type="text" name="size" value=""><br>
              </div>

              <div class="col-4">
                <label for="expiration_date">Expiration Date</label><br>
                <input type="text" name="expiration_date" value=""><br>
              </div>
          </div>

            <br>

          <div class="row">
            <div class="col-4">
              <label for="stock_qty">Stock Qty</label><br>
              <input type="text" name="stock_qty" value=""><br>
            </div>

            <div class="col-4">
              <label for="store_location">Store Location</label><br>
              <input type="text" name="store_location" value=""><br>
            </div>

            <br>

            <div class="col-4">
              <label for="price">Price</label><br>
              <input type="text" name="price" value=""><br>
            </div>

            <button class="create-btn mt-5" type="submit">Save</button>
        </form>
        </div>
    </div>

    </div>
    </div>
</div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

  </html>
