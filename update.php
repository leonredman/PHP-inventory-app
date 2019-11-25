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
        'UPDATE inventory SET category = :category, item = :item, brand = :brand, type = :type, unit = :unit, size = :size, expiration_date = :expiration_date,
        stock_qty = :stock_qty, store_location = :store_location, price = :price where id = :id');
        $statement->execute(['category' => $category, 'item' => $item, 'brand' => $brand, 'type' => $type, 'unit' => $unit,
         'size' => $size, 'expiration_date' => $expiration_date, 'stock_qty' => $stock_qty, 'store_location' => $store_location, 'price' => $price, "id" => $id]);
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
                      <h4> Update Inventory</h4>
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




                <form class="form ml-4 pl-4" action="./update.php?id=<?php echo $results[0]->id; ?>" method="POST">
                  <input type="hidden" name="_method" value="PUT">

                  <label for="category">Category</label><br>
                  <input type="text" name="category" value="<?php echo $results[0]->category; ?>"><br><br>

                  <div class="row">
                      <div class="col-4">

                        <label for="item">Item</label><br>
                        <input type="text" name="item" value="<?php echo $results[0]->item; ?>"><br>
                      </div>


                      <div class="col-4">
                        <label for="brand">Brand</label><br>
                        <input type="text" name="brand" value="<?php echo $results[0]->brand; ?>"><br>
                      </div>

                      <div class="col-4">
                        <label for="type">Type</label><br>
                        <input type="text" name="type" value="<?php echo $results[0]->type; ?>"><br>
                      </div>
                  </div>

                  <br>

                  <div class="row">
                      <div class="col-4">
                        <label for="unit">Unit</label><br>
                        <input type="text" name="unit" value="<?php echo $results[0]->unit; ?>"><br>
                      </div>

                      <div class="col-4">
                        <label for="size">Size</label><br>
                        <input type="text" name="size" value="<?php echo $results[0]->size; ?>"><br>
                      </div>

                      <div class="col-4">
                        <label for="expiration_date">Expiration Date</label><br>
                        <input type="text" name="expiration_date" value="<?php echo $results[0]->expiration_date; ?>"><br>
                      </div>
                  </div>

                  <br>

                  <div class="row">
                      <div class="col-4">
                        <label for="stock_qty">Stock Qty</label><br>
                        <input type="text" name="stock_qty" value="<?php echo $results[0]->stock_qty; ?>"><br>
                      </div>

                      <div class="col-4">
                        <label for="store_location">Store Location</label><br>
                        <input type="text" name="store_location" value="<?php echo $results[0]->store_location; ?>"><br>
                      </div>

                      <div class="col-4">
                        <label for="price">Price</label><br>
                        <input type="text" name="price" value="<?php echo $results[0]->price; ?>"><br>
                      </div>
                  </div>
                  <button class="update-btn mt-5" type="submit">Save</button>
                </form>

              </body>

  </html>
