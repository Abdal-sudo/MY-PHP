<?php
$servername = "localhost";
$username = "root";  
$password = "root";  // For XAMPP, leave this blank.
$dbname = "schoolDb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = isset($_POST['table']) ? $_POST['table'] : '';

if (!empty($table)) {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `$table`");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h1>Data from $table</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        while ($field_info = $result->fetch_field()) {
            echo "<th>{$field_info->name}</th>";
        }
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $stmt->close();
} else {
    echo "No table selected.";
}

$conn->close();
?>
<br><a href="index.php">Go Back</a>
