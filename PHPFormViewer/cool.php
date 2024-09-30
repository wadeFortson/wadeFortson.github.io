<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1, h2 {
            color: red;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <h1>Form Results</h1>
    <?php
    echo "<p>Here is the start of a form viewer: a PHP array of name/value pairs.</p>";
    if ($_GET) {
        echo "<h2>GET Array:</h2>";
        echo "<table>";
        echo "<tr><th>Key</th><th>Value</th></tr>";
        foreach ($_GET as $key => $value) {
            echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
        }
        echo "</table>";
    }
    if ($_POST) {
        echo "<h2>POST Array:</h2>";
        echo "<table>";
        echo "<tr><th>Key</th><th>Value</th></tr>";
        foreach ($_POST as $key => $value) {
            echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>

