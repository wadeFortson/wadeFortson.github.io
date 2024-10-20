<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Listing</title>
</head>
<body>
    <h1>Just Added</h1>

    <?php
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // See the contents of $_POST, submitted from index.html
    var_dump($_POST);

    // Collect input using POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = htmlspecialchars($_POST['first']);
        // TODO: set lastname and country in the same manner as above
        //I also added age and gender
        $lastname = htmlspecialchars($_POST['last']);
        //$age = htmlspecialchars($_POST['age']);
        //$gender = htmlspecialchars($_POST['gender']);
        $country = htmlspecialchars($_POST['country']);
        

        echo "<p>Adding <strong>$firstname</strong>.</p>";
        echo "<p>Adding <strong>$lastname</strong>.</p>";
        //echo "<p>Adding <strong>$age</strong>.</p>";
        //echo "<p>Adding <strong>$gender</strong>.</p>";
        echo "<p>Adding <strong>$country</strong>.</p>";
        

        // DATABASE OPERATIONS:
        // TODO: this MUST be updated to your own credentials to work on your MariaDB
        $servername = "localhost";   // same for local dev and school server
        $username = "user44";        // get this from the email
        $password = "44nida";        // get this from the email 
        $dbname = "db44";            // get this from the email

        try {
            // Create a PDO connection (PHP Data Object)
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL and bind parameters
            $stmt = $conn->prepare("INSERT INTO randuser (first, last, country) VALUES (:first, :last, :country)");
            $stmt->bindParam(':first', $firstname);
            $stmt->bindParam(':last', $lastname);
            // Uncomment if you want to include age
            //$stmt->bindParam(':age', $age);
            // Uncomment if you want to include gender
            //$stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':country', $country);
            
            echo "<div>";
            if ($stmt->execute()) {
                echo "<p>New record created successfully</p>";
            } else {
                echo "<p>Error: Unable to create a new record.</p>";
            }
            echo "</div>";

            // Select and display all users from the database
            $sql = "SELECT first, last, country FROM randuser";// MySQL: read every record from the table. Hint: https://www.w3schools.com/mysql/mysql_select.asp
            $result = $conn->query($sql);

            echo "<div>";
                echo "<table>";
                echo "<thead><tr><th>First Name</th><th>Last Name</th><th>Country</th></tr></thead><tbody>";
                //<th>Age</th><th>Gender</th>
                // output data of each row
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    // TODO: change the hardcoded string to actual API data, ie: firstname, etc.. 
                    echo "<tr><td>" . htmlspecialchars($row['first']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['last']) . "</td>";
                   // echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                    //echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['country']) . "</td></tr>";
                }
                echo "</tbody></table>";
            echo "</div>";

        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }

        // Close the connection
        $conn = null;

    } else {
        echo "<p>No data was submitted.</p>";
    }
    ?>
</body>
</html>