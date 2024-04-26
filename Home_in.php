<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Validator</title>
    <style>
        /* Some basic styling for the form */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the certificate data from the form
    $certificate_data = $_POST["certificate"];

    // Here you would perform validation logic on the certificate data.
    // This could involve checking against a database of valid certificates,
    // verifying the certificate signature, etc.
    // For demonstration purposes, let's just echo back the certificate data.
    echo "<p><strong>Submitted Certificate Data:</strong></p>";
    echo "<pre>" . htmlspecialchars($certificate_data) . "</pre>";
}
?>

<form method="post">
<h1>Home</h1>
    <label for="certificate">Certificate Data:</label>
    <input type="text" name="certificate" id="certificate" required>
    
    <input type="submit" value="Validate">
</form>

</body>
</html>
