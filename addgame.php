

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(images/Desktop\ -\ 2\ \(1\).png);
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p.error {
            color: red;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form method="post" action="uploadgames.php" enctype="multipart/form-data">
        <h2>Image Upload</h2>
        <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>";
            echo htmlspecialchars($_GET['error']);
            echo "</p>";
        }
        ?>
        <input type="file" name="images[]">
        <input type="text" placeholder="year"  name="year">
        <input type="text" placeholder="kind" name="kind">
        <input type="text" placeholder="description"  name="description">
        <select name="platform" id="platform">
        <option value="pc">PC</option>
        <option value="xbox">Xbox</option>
        <option value="playstation">PlayStation</option>
        </select>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>
<?php

