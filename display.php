<?php
// Start the session
session_start();

// Get the form data from SESSION variables
$firstName = $_SESSION["firstName"];
$lastName = $_SESSION["lastName"];
$email = $_SESSION["email"];
$address = $_SESSION["address"];
$image = $_SESSION["image"];

// Validate the form data
if (empty($firstName) || empty($lastName) || empty($email)) {
    echo "Error: First name, last name, and email are required.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <style>
        body {
            background-color: gray;
            opacity: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 800px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .left-column {
            flex: 1;
            display: flexbox;
            flex-direction: column;
            align-items: flex-start;
            padding-right: 20px;
        }

        .right-column {
            flex: 1;
            display: flex;
            justify-content: right;
            
        }

        img {
            border-radius: 50%;
            max-width: 200px;
        }

        h2 {
            margin-top: 0;
        }

        p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-column">
            <h2>Name: <?php echo $firstName . " " . $lastName; ?></h2>
            <p>Email: <?php echo $email; ?></p>
            <p>Address: <?php echo $address; ?></p>
        </div>
        <div class="right-column">
            <?php if (!empty($image)) { ?>
                <img src="<?php echo $image; ?>" alt="Uploaded Image">
            <?php } ?>
        </div>
    </div>
</body>
</html>

