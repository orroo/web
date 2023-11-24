<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create the 'tests' table
$sqlCreateTable = "
    CREATE TABLE tests (
        idTest INT PRIMARY KEY AUTO_INCREMENT,
        idService INT,
        taille INT,
        type VARCHAR(255),
        FOREIGN KEY (idService) REFERENCES services(idService)
    )
";

// Execute the create table query
if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Table 'tests' created successfully<br>";
} else {
    echo "Error creating table 'tests': " . $conn->error . "<br>";
}

// Insert data into the 'tests' table
$sqlInsertData = "
    INSERT INTO tests (idService, taille, type) VALUES
    (, 10, 'depression')
";

// Execute the insert data query
if ($conn->query($sqlInsertData) === TRUE) {
    echo "Data inserted into 'tests' table successfully<br>";
} else {
    echo "Error inserting data into 'tests' table: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
