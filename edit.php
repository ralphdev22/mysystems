<?php

  include "db_connect.php";

  $sql = "SELECT * FROM articles WHERE id = '{$_GET["id"]}'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Post - Framgia</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>Edit post</h2>

        <form class="form-horizontal" method="POST" action="process.php">
          <input type="hidden" name="id" value="<?php echo $row["id"]?>">
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Title" value="<?php echo $row["title"]?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputDescription" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDescription" name="inputDescription" placeholder="Description" value="<?php echo $row["content"]?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="edit" class="btn btn-warning">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
</html>