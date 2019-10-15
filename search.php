<?php

require('database.php');
initMigration($pdo);



//
// if($_SERVER['REQUEST_METHOD'] == "GET") {
// try{
//   $statement = $pdo->prepare(
//     'SELECT * FROM inventory WHERE stock_qty = 0;'
//   );
//   $statement->execute();
//
//   $results = $statement->fetchAll(PDO::FETCH_OBJ);
//
// } catch(PDOException $e){
//   echo "<h4 style='color: red;'>".$e->getMessage(). "</h4>";
// }
// }





  // $search_keyword = (!empty($_POST['search_keyword'])) ? $_POST['search_keyword'] : "";
  //
  // $sql = 'SELECT * FROM search_page WHERE description LIKE :keyword ORDER BY id DESC ';
  // $pdo_conn = new PDO("mysql:host=server;dbname=dbname", "user", "pass");
  // $pdo_statement = $pdo_conn->prepare($query);
  // $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
  // $pdo_statement->execute();
  // if(!$pdo_statement->rowCount()){
  // //if the results is null
  // echo "no result found"}else{
  // //found some row according to your search
  // //do some operations based on your application
  // $result = $pdo_statement->fetchAll();
  // }




//
// if(issset($_GET['keywords'])) {
//
//   $keywords = $db->escape_string($_GET['keywords']);
//
//   $query = $db->query("
//   SELECT title, published
//   FROM articles
//   WHERE body LIKE '%{$keywords}%'
//   OR title LIKE '%{$keywords}%'
//   ");
//
// }


 ?>


 <html>
   <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <!-- <link rel="stylesheet" href="./css/styles.css"> -->
     <title>Culinary Closet Inventory Managemt</title>
   </head>

   <body>

     <a href="./create.php">Create Inventory</a>
     <br>
     <br>
     <a href="/">Show All Inventory</a>
     <br>
     <br>
     <a href="./shopping_list.php">Current Shopping List</a>
     <br>
     <br>
   <!-- end menu -->

 <!-- search form -->
   <form action="search.php" method="get">
     <label>
       Search Products
       <input type="text" name="product_name" autocomplete="off">
     </label>

     <input type="submit" value="search">
   </form>
 <!-- search form  end-->
 <table class="table table-hover">
<tr>
 <th>id</th>
 <th>size</th>
 <th>brand</th>
 <th>product_name</th>
 <th>stock_qty</th>
 <th>store</th>
 <th>price</th>
 <th>edit</th>
 <th>delete</th>
</tr>
</table>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
