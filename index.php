<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  </head>
  <body>
    <div class="contaner">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-5 text-center">PHP Assiment</h2>
                <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Acton</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                                // Fetch the next row of a result set as an associative array
                                while ($res = mysqli_fetch_assoc($result)) {
                                  echo "<tr>";
                                  echo "<td>".$res['id']."</td>";
                                  echo "<td>".$res['name']."</td>";
                                  echo "<td>".$res['Pirce']."</td>";
                                  echo "<td>";
                                  echo "<a href=\"edit.php?id=$res[id]\"class='btn btn-success'><i class='las la-edit'></i></a>";
                                  echo "<a href='delete.php?id=".$res['id']."' class='btn btn-danger'><i class='las la-trash'></i></a>";
                                  echo "</td>";
                                  echo "</tr>";
                                }
                                ?>

                            
                        </td>
                      </tr>
                    
                    </tbody>
                  </table>




            </div>
        </div>
    </div>
         


    
  
  
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">

    <form action="add.php" method="post" name="add"  onsubmit="return validateForm()">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalLabel">Add Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="errMsgContainer mb-3" >
            </div>
            <div class="form-group">
                <label for="name">Product name</label>
                <input type="text" class="form-control" name="name" id="name"placeholder="Product Name">
            </div>
            <div class="form-group mt-2">
                <label for="name">Product price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Product Prce">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submite"  name="submit" class="btn btn-primary add_product">Save Product</button>
        </div>
      </div>
    </div>
</form>
  </div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  
<script> function validateForm() {
    var name = document.getElementById("name").value;
    var price = document.getElementById("price").value;
   
  
    if (name === "" || price === "") {
      alert("Please fill in all the fields.");
      return false;
    }
   if (  price < 10) {
      alert("Please enter a positive number up to 10.");
      return false;
    }

return true;
    
  }
  </script>
   

</body>
</html>