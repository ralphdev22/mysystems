<?php
  
  include "db_connect.php";

  $sql = "SELECT * FROM articles";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard - Framgia</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
          <div class="col-md-6"><h3>Blogs</h3></div>
          <div class="col-md-6">
            <a id="btn-add" class="btn btn-primary pull-right" href="add.php" role="button">+ Create new</a>
          </div>
        </div>

        <br>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Created at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0) :?>
              <?php while($row = $result->fetch_assoc()) :?>
                <tr id="<?php echo $row["id"];?>">
                  <td><?php echo $row["id"];?></td>
                  <td>
                    <a href="view.php?id=<?php echo $row["id"];?>" role="button"><?php echo $row["title"];?></a>
                  </td>
                  <td><?php echo $row["content"];?></td>
                  <td><?php echo $row["created"];?></td>
                  <td>
                    <a class="btn btn-success" href="edit.php?id=<?php echo $row["id"];?>" role="button">Edit</a>
                    <a class="btn btn-danger" href="#" onclick="deletepost(event,this,<?php echo $row["id"];?>)" role="button">Delete</a>
                  </td>
                </tr>
              <?php endwhile;?>
            <?php endif; ?>
          </tbody>
        </table>
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
              $(btn).closest('tr').fadeOut('slow', 
                function(here){ 
                    $(that).parents('tr:first').remove();                    
              });  
            } else {
              alert("Something went wrong. Please, try again.");
            }
          }
      });
      }
    </script>
  </body>
</html>