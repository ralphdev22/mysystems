<?php
	
	include "../db_connect.php";

	if (isset($_POST["add_post"])) {
		$status = false;

		$sql = "INSERT INTO articles (title, content, created, modified)
				VALUES ('{$_POST["title"]}', '{$_POST["description"]}', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";

		if ($conn->query($sql) === TRUE) {
			$status = true;
		}

		echo json_encode(array(
			'success' => $status
		));
	}

	if (isset($_POST["get_list"])) {
		$sql = "SELECT * FROM articles";
		$result = $conn->query($sql);

		$data = $result->fetch_all(MYSQLI_ASSOC);
		$total = count($data);

		echo json_encode(array(
			"total" => $total,
			"data" => $data,
		));
	}
?>