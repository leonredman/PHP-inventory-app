  <?php

  // if login successful

  session_start();

  if(isset($_SESSION["username"]))
  {

    // echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';
    // echo '<br /><br /><a href="/logout.php">Logout</a>';
  }
  else {
    {
      header("location:/login.php");
    }
  }

    require('database.php');
    initMigration($pdo);

    // pagination user input tutorial https://www.youtube.com/watch?v=8WoxPWVxXHI
     $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
     $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3;
     // positioning

     $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


    $keywordfromform = $_GET["keyword"];

    if($_SERVER['REQUEST_METHOD'] == "GET") {
    try{
      $statement = $pdo->prepare(
        "SELECT SQL_CALC_FOUND_ROWS * FROM inventory LIMIT {$start}, {$perPage};"
      );
      $statement->execute();

      $results = $statement->fetchAll(PDO::FETCH_OBJ);
      // echo "Read from table users</br>";

      //PAGES
     $total = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
     $pages = ceil($total / $perPage);

    } catch(PDOException $e){
      echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
    }
  }
  ?>

  <html>
    <head>
      <meta charset="utf-8">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes"> -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <!-- added scripts -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

      <!-- custom stylesheet -->
      <link rel="stylesheet" href="./css/styles.css">
      <title>Weable Inventory Managemt</title>
    </head>

    <body>
      <div class="wrapper">

                  <!-- Sidebar -->
             <nav id="sidebar">
               <div class="logo">
                 <img src="./images/logo_trans2.png">
               </div>

               <div class="sidebar-header">
                 <h4>WEABLE<br>INVENTORY</h4>
               </div>
                <br> <br>
                  <ul class="list-unstyled components">
                    <!-- <p>Dashboard</p> -->

                    <li>
                       <a href="/">HOME</a>
                    </li>
                    <li>
                        <a href="./create.php">CREATE INVENTORY</a>
                    </li>
                    <li>
                       <a href="./shopping_list.php">SHOPPING LIST</a>
                    </li>
                    <li>
                       <a href="all_inventory.php">ALL INVENTORY</a>
                    </li>
                    <li>
                      <a href="./logout.php">Logout</a>
                    </li>

                       <!-- <li class="nav-item">
                         <a class="nav-link" href="/">Go Back</a>
                       </li> -->
                  </ul>
                </nav>

            <div id="content">

              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                  <button type="button" id="sidebarCollapse" class="btn btn-info">
                      <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                   </button>
                 </div>
             </nav>


                          <!--  menu end -->
      <div class="col">

        <div class="menu-bar">
        </div>
        <br>
                          <!-- search form -->
        <div class="search-form">
          <h4>Dashboard</h4>
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

              <br>

              <div class="row-seperator"></div>

                <div class="container-fluid">

                  <div class="row">

                    <div class="card mt-4 m-2">
                      <div class="card-header">
                        Expiring Inventory
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Products</h5>
                          <p class="card-text">Summary of the items expiring within a given date range.</p>
                            <a href="#" class="btn btn-primary">Search</a>
                      </div>
                    </div>

                    <div class="card  mt-4 m-2">
                      <div class="card-header">
                        Archived Products
                      </div>

                      <div class="card-body">
                        <h5 class="card-title">Products</h5>
                          <p class="card-text">Summary of all items archived within a given date range.</p>
                            <a href="#" class="btn btn-primary">Search</a>
                      </div>
                    </div>

                    <div class="card  mt-4 m-2">
                      <div class="card-header">
                        Inventory Statistics
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Report</h5>
                        <p class="card-text">Summary Report of all items and categories in inventory.</p>
                        <a href="#" class="btn btn-primary">Search</a>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="card mt-4 m-2">
                      <div class="card-header">
                        Inventory Activity and News
                      </div>
                      <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <p> Currently in development { Pagination on pages }
                          <p> Stay tuned, we are developing features to include reports, archive radio buttons and date stamp.</p>
                          <p> For technical support please email: leonredman917@gmail.com</p>
                          <footer class="blockquote-footer">December 7, 2019 <cite title="Source Title">Leon</cite></footer>
                        </blockquote>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script>$(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
    </script>

    </body>
  </html>
