<?php

function init_db (){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE DATABASE  IF NOT EXISTS web_db";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    $sql = "USE web_db";
    if ($conn->query($sql) === TRUE) {
    }
    $sql = "
    CREATE TABLE cv (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    name VARCHAR(100),
    gender VARCHAR(20),
    phone_number VARCHAR(20),
    email VARCHAR(100),
    reference TEXT,
    degree VARCHAR(100),
    school VARCHAR(100),
    year_of_study INT,
    major VARCHAR(100),
    address VARCHAR(255),
    city VARCHAR(100),
    country VARCHAR(100),
    skill_name VARCHAR(100),
    years_of_experience INT,
    start_date DATE,
    end_date DATE,
    company_name VARCHAR(100),
    position VARCHAR(100),
    auth_viewer_only BOOLEAN
);
";
if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating Tables: " . $conn->error;
}

}





class Database {
    private $host = "localhost";
    private $db_name = "web_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=3306;dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
    public function get_cv_info($cv_id) {
        try {
            // Ensure a valid database connection
            if ($this->conn === null) {
                $this->getConnection();
            }

            // SQL query to fetch the CV data
            $query = "SELECT * FROM cv WHERE id = :cv_id";

            // Prepare the statement
            $stmt = $this->conn->prepare($query);

            // Bind the `cv_id` parameter
            $stmt->bindParam(':cv_id', $cv_id, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Fetch the result as an associative array
            $cv_info = $stmt->fetch(PDO::FETCH_ASSOC);

            // Return the CV information or null if not found
            return $cv_info ?: null;
        } catch (PDOException $e) {
            echo "Error fetching CV information: " . $e->getMessage();
            return null;
        }
    }
}
//init_db();
?>