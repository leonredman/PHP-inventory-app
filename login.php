  <?php
  session_start();
  $host = "localhost";
  $username = "root";
  $password = "root";
  // $database = "inventory"
  $message = "";

  function connectDB(){

    try {

      $database = new PDO('mysql:host=localhost;dbname=inventory', 'root', 'root');
      $database->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "<h4 style='color: green;'>Database Connected</h4>";
      return $database;

      if(isset($_POST["login"]))
      {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
          $message = '<label> All fields are required</label>';
        }
        else {
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
            header("location:index.php";)
          }

        }


    } catch(PDOException $e){
      echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
    }
  };




   ?>



     <html>
       <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         <!-- Bootstrap sCSS -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
         <link rel="stylesheet" href="./css/styles.css">
         <title>Weable Inventory Managemt</title>
       </head>

       <body>
         <br />
         <div class="container" style="width: 500px;">
           <h3 aligh="">Weable Inventory Log In</h3><br />
           <form method="post">
             <label>Username</label>
             <input type="text" name="username" class="form-control" />
             <br />
             <label>Password</label>
             <input type="password" name="password" class="form-control" />
             <br />

             <input type="submit" name="login" class="btn btn-info" value="Login" />

           </form>

         </div>
         <br />
       </body>
     </html>
