<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container form {
            display: inline-block;
            margin-right: 10px;
        }
        .button-container input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Select a Table to View Data</h1>
    <div class="button-container">
        <form method="POST">
            <input type="submit" name="table" value="class_subject">
        </form>
        <form method="POST">
            <input type="submit" name="table" value="result">
        </form>
        <form method="POST">
            <input type="submit" name="table" value="student_class">
        </form>
        <form method="POST">
            <input type="submit" name="table" value="subject">
        </form>
        <form method="POST">
            <input type="submit" name="table" value="subject_teacher">
        </form>
        <form method="POST">
            <input type="submit" name="table" value="teacher">
        </form>
    </div>

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $table = isset($_POST['table']) ? $_POST['table'] : '';

        if (!empty($table)) {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM `$table`");
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<h1>Data from $table</h1>";
                echo "<table>";
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
    }

    $conn->close();
    ?>
</body>
</html>
