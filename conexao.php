<?php
$servername = "forumetec.mysql.database.azure.com"; // Link do Azure
$username = "forumetec"; // Nome do Usuario do MYSQLI
$password = "f0rum3t3cab!"; // Senha (Normalmente: f0rum3t3cab!)
$dbname = "db_cadastro"; // Nome do Database

$servername = "localhost"; // Link do Azure
$username = "root"; // Nome do Usuario do MYSQLI
$password = "root"; // Senha (Normalmente: f0rum3t3cab!)
// Create connection
$conn2 = new mysqli($servername, $username, $password);

// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}
$conn = new mysqli($servername, $username, $password, $dbname);

?>