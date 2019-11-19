  <?php
  session_start();
  $host = "localhost";
  $username = "root";
  $password = "root";
  $database = "inventory";
  $message = "";

  // if page breaks can use login tutorial https://www.youtube.com/watch?v=b-2_Y53CTYA
  // connect to database with PDO try and catch, database name inventory table name users

  try
  {
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["login"]))
    {
      if(empty($_POST["username"]) || empty($_POST["password"]))
      {
        $message = '<label> All fields are required</label>';
      }
      else
      {
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $connect->prepare($query);
        $statement->execute(
          array(
            'username' => $_POST["username"],
            'password' => $_POST["password"]
          )
        );
        $count = $statement->rowCount();
        if($count > 0)
        {
          $_SESSION["username"] = $_POST["username"];
          header("location:index.php");
        }
        else
        {
          $message = '<label>Wrong Data</label>';
        }
      }
    }
  }

     catch(PDOException $error)
     {
       $message = $error->getMessage();
    }

   ?>

    <!-- login form -->
     <html>
       <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         <!-- Bootstrap SCSS -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
         integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
         <link rel="stylesheet" href="./css/styles.css">
         <title>Weable Inventory Managemt</title>
     </head>

       <body style="background:transparent url('./images/background-image.jpg') no-repeat center center /cover">
       <br>

         <div class="container" style="width: 600px; margin-top:100px;">
           <h1 align="center">WELCOME<br> TO<br> WEABLE INVENTORY</h1>
           <br>
           <h3 align="center">USER LOGIN</h3>
           <br>
          <div class="form-container">

           <form method="post">
             <label>Username</label>
             <input type="text" name="username" class="form-control" />
             <br>
             <label>Password</label>
             <input type="password" name="password" class="form-control" />
             <br>
             <input type="submit" name="login" class="btn btn-info" value="Login" />
           </form>
           
           <?php
             if(isset($message))
             {
               echo '<label class="text-danger">'.$message.'</label>';
             }
           ?>
          </div>
         </div>
       </body>
     </html>
