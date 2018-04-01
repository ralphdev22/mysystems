<?php

	include "db_connect.php";

	// for add
	if (isset($_POST["add"])) {
		
		$sql = "INSERT INTO articles (title, content, created, modified)
				VALUES ('{$_POST["inputTitle"]}', '{$_POST["inputDescription"]}', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";

		if ($conn->query($sql) === TRUE) {
			header("Location: index.php");
			exit();
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	// for edit
	if (isset($_POST["edit"])) {

		$sql = "UPDATE articles SET title = '{$_POST["inputTitle"]}', content = '{$_POST["inputDescription"]}' WHERE id = '{$_POST["id"]}'";

		if ($conn->query($sql) === TRUE) {
			header("Location: index.php");
			exit();
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	// for delete
	if (isset($_POST["delete"]) && $_POST["delete"] === "true") {

		$status = false;

		$sql = "DELETE FROM articles WHERE id = '{$_POST["id"]}'";

		if ($conn->query($sql) === TRUE) {

			$status = true;
		}

		echo json_encode(array(
	    	"status" => $status
	    ));
	}

	$conn->close();
?>