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
    </style>
</head>
<body>
    <h1>Select a Table to View Data</h1>
    <div class="button-container">
        <form action="DataFetch.php" method="POST">
          <input type="hidden" name="table" value="class_subject">
          <input type="submit" value="Class Subject">
       </form>
        <form action="DataFetch.php" method="POST">
            <input type="hidden" name="table" value="result">
            <input type="submit" value="Result">
        </form>
        <form action="DataFetch.php" method="POST">
            <input type="hidden" name="table" value="student_class">
            <input type="submit" value="Student Class">
        </form>
        <form action="DataFetch.php" method="POST">
            <input type="hidden" name="table" value="subject">
            <input type="submit" value="Subject">
        </form>
        <form action="DataFetch.php" method="POST">
            <input type="hidden" name="table" value="subject_teacher">
            <input type="submit" value="Subject Teacher">
        </form>
        <form action="DataFetch.php" method="POST">
            <input type="hidden" name="table" value="teacher">
            <input type="submit" value="Teacher">
        </form>
    </div>
</body>
</html>
