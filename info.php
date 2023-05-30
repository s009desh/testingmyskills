<?php
// Connection configuration
$servername = "34.251.133.41";
$port = 1433;
$username = "sa";
$password = "123456789";
$database = "exampledb";

// Connect to SQL Server
$conn = new PDO("sqlsrv:Server=$servername,$port;Database=$database", $username, $password);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$name = "John Doe";
$email = "john@example.com";
$sql = "INSERT INTO users (name, email) VALUES (?, ?)";
$params = array($name, $email);
$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "New record created successfully";
}

// Retrieve data from the users table
$sql = "SELECT * FROM users";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
    }
}

// Close the SQL Server connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

?>
