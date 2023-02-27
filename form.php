<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    h1 {
        font-size: 32px;
        margin-top: 0;
    }

    img {
        max-width: 100%;
        margin-bottom: 20px;
    }

    dl {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
        margin: 0;
    }

    dt {
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .container {
            padding: 10px;
            border-radius: 0;
        }

        h1 {
            font-size: 24px;
        }

        dl {
            grid-template-columns: 1fr;
        }
    }
  </style>
</head>
<body>
    
    <div class="container">
    
    <form action="nextpage.php" method="POST" enctype="multipart/form-data">
        First Name:
        <input type="text" name="fname"><br><br>
        Last Name:
        <input type="text" name="lname"><br><br>
        Email:
        <input type="email" name="email"><br><br>
        Address:
        <input type="text" name="adress"><br><br>
        Upload Image:
        <input type="file" name="upimage"><br><br>
        
        <input type="reset">
        <input type="submit"/>

        

        </div>


    
      
</body>
</html>
