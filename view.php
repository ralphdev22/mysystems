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

    <title>View Post - Framgia</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>View blog</h2>

        <form class="form-horizontal" method="POST" action="process.php">
          <input type="hidden" name="id" value="<?php echo $row["id"];?>">
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Title" value="<?php echo $row["title"]?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputDescription" class="col-sm-2 control-label">Details</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDescription" name="inputDescription" placeholder="Details" value="<?php echo $row["content"]?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <a href="edit.php?id=<?php echo $row["id"];?>" class="btn btn-success">Edit</a>
              <a class="btn btn-danger" href="#" onclick="deletepost(event,this,<?php echo $row["id"];?>)" role="button">Delete</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript">
        function deletepost(e,btn,id) {
          e.preventDefault();

          var that = btn;

          $.ajax({
            url: 'process.php',
            type: 'post',
            dataType: 'json',
            data: {
              "delete": true,
              "id": id
            },
            success: function(data) {
              
              if (data.status) {
                window.location.href = "index.php";
              } else {
                alert("Something went wrong. Please, try again.");
              }
            }
        });
        }
      </script>
  </body>
</html>