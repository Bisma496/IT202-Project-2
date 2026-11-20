
<?php
// IT 202 Project 2
// Moving On Up - Database Connection


$host = "sql1.njit.edu";
$dbname = "bt336";
$username = "bt336";

// Set this securely on the server.
// Do not put your real password in GitHub.
$password = getenv("MOU_DB_PASSWORD");


try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit("Database connection failed. Please contact the administrator.");
}
?>
