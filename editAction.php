<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php 
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in strings for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);

	// Check for empty fields
	if (empty($name) || empty($price)) {
		echo "<font color='red'>Please fill in all fields.</font><br/>";
	} else {
		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO users (`name`, `pirce`) VALUES ('$name', '$price')");

		if ($result) {
			// Display success message
			echo "<p><font color='green'>Data added successfully!</p>";
			// Redirect to the same page
			header("Location:index.php");
			exit;
		} else {
			// Display error message
			echo "Error: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
