  <?php


  session_start();

  if(isset($_SESSION["username"]))
  {
    // echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';
    // echo '<br /><br /><a href="/logout.php">Logout</a>';
  }
  else {
    {
      header("location:./login.php");
    }
  }

    require('database.php');
      // POST
      // GET
      // PUT
      // DELETE

   // HANDLES  POST request
   if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET["id"]) && $_POST["_method"] == "PUT") {
     $category = $_POST["category"];
     $item = $_POST["item"];
     $brand = $_POST["brand"];
     $unit = $_POST["unit"];
     $size = $_POST["size"];
     $expiration_date = $_POST["expiration_date"];
     $stock_qty = $_POST["stock_qty"];
     $store_location = $_POST["store_location"];
     $id = $_GET["id"];

    try{
      $statement = $pdo->prepare(
        'UPDATE inventory SET category = :category, item = :item, brand = :brand, unit = :unit, size = :size, expiration_date = :expiration_date,
        stock_qty = :stock_qty, store_location = :store_location where id = :id');
        $statement->execute(['category' => $category, 'item' => $item, 'brand' => $brand, 'unit' => $unit,
         'size' => $size, 'expiration_date' => $expiration_date, 'stock_qty' => $stock_qty, 'store_location' => $store_location, "id" => $id]);
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
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar-responsive">
          <a class="navbar-brand" href="/">Weable Inventory</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="./create.php">Create Inventory</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/">All Inventory</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="./shopping_list.php">Shopping List</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/">Go Back</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Log Out</a>
                  </li>
                </ul>

              </div>
        </nav>

          <div class="menu-bar"></div>
            <br></br>

              <!-- search form -->
                <div class="search-form">
                    <h4> Update Inventory</h4>
                    <br> <br>
                      <form action="search.php" method="get">
                        <label>
                          Search Products
                            <input type="text"  class="form-control" name="keyword" autocomplete="off">
                        </label>

                        <input type="submit" class="btn text-light" value="Submit">
                      </form>
                </div>
            <br>
              <!-- search end -->
            <br>

            <div class="row-seperator"></div>
              <br><br>

                <div class="container" id="update-container">

                      <form class="form" action="./update.php?id=<?php echo $results[0]->id; ?>" method="POST">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="row">
                              <div class="form-group col-md-6">
                                <label for="category">Category</label><br>
                                <select name="category" value="<?php echo $results[0]->category; ?>"><br><br>
                                    <option value="Baking">Baking</option>
                                    <option value="Beauty">Beauty</option>
                                    <option value="Beverages">Beverages</option>
                                    <option value="Condiments/Oils">Condiments/Oils</option>
                                    <option value="Cleaning Supplies">Cleaning Supplies</option>
                                    <option value="Frozen">Frozen</option>
                                    <option value="Fish">Fish</option>
                                    <option value="Grains">Grains</option>
                                    <option value="Health">Health</option>
                                    <option value="Meat">Meat</option>
                                    <option value="Paper Goods">Paper Goods</option>
                                    <option value="Poultry">Poultry</option>
                                    <option value="Spices">Spices</option>
                                  </select>
                                
                              </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="item">Item</label><br>
                            <input type="text" class="form-control" name="item" value="<?php echo $results[0]->item; ?>"><br>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="brand">Brand</label><br>
                            <input type="text" class="form-control" name="brand" value="<?php echo $results[0]->brand; ?>"><br>
                          </div>
                        </div>

                    <br>
                  <div class="row">
                      <div class="form-group col-md-4">
                        <label for="unit">Unit</label><br>
                        <input type="text" name="unit" value="<?php echo $results[0]->unit; ?>"><br>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="size">Size</label><br>
                        <input type="text" class="form-control" name="size" value="<?php echo $results[0]->size; ?>"><br>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="expiration_date">Expiration Date</label><br>
                        <input type="text" class="form-control" name="expiration_date" value="<?php echo $results[0]->expiration_date; ?>"><br>
                      </div>
                  </div>

                  <br>

                  <div class="row">
                      <div class="form-group col-md-4">
                        <label for="stock_qty">Stock Qty</label><br>
                        <input type="text" class="form-control" name="stock_qty" value="<?php echo $results[0]->stock_qty; ?>"><br>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="store_location">Store Location</label><br>
                        <input type="text" class="form-control" name="store_location" value="<?php echo $results[0]->store_location; ?>"><br>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="price">Price</label><br>
                        <input type="text"  class="form-control" name="price" value="<?php echo $results[0]->price; ?>"><br>
                      </div>
                  </div>
                  <button class="update-btn mt-5" type="submit">Save</button>
                </form>
              </div>
            </div>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
  </html>
