<?php
// Start the session
session_start();

// Initialize variables for form input
$firstName = "";
$lastName = "";
$email = "";
$address = "";
$image = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $email = test_input($_POST["email"]);
    $address = test_input($_POST["address"]);

    // Validate the image file
    if ($_FILES["image"]["size"] > 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            echo "Error: File is not an image.";
        } elseif ($_FILES["image"]["size"] > 500000) {
            echo "Error: File is too large.";
        } elseif ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Error: Only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            // Move the uploaded file to the uploads directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = $target_file;
            } else {
                echo "Error: There was an error uploading your file.";
            }
        }
    }

    // Store the form data in SESSION variables
    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["email"] = $email;
    $_SESSION["address"] = $address;
    $_SESSION["image"] = $image;

    // Redirect to the display page
    header("Location: display.php");
    exit();
}

// Function to validate form input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Example</title>
	<style>
		p{
			color: white;
		}

		.container {
			
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 800px;
            background-color: #243447;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
			text
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="text"], input[type="email"], textarea, input[type="file"] {
            margin: 10px 0;
			color: white;
            padding: 5px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="reset"], input[type="submit"] {
            margin: 10px 0;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="reset"]:hover, input[type="submit"]:hover {
            background-color: #2E8B57;
        }
    </style>
</head>
<body>
	<div class="container">

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label for="firstName"> <p>First Name:</p></label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
        <label for="lastName"><p>Last Name:</p> </label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
        <label for="email"><p>Email:</p> Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        <label for="address"><p>Address: </p></label>
        <textarea id="address" name="address"><?php echo $address; ?></textarea>
        <label for="image"><p>Image:</p> </label>
        <input type="file" id="image" name="image">
        <input type="reset" value="Cancel">
        <input type="submit" value="Submit">
</body>
	</div>

</html>
