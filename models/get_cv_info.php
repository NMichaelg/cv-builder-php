<?php
include 'database.php';
$database = new Database();
$db = $database->getConnection();

// Handle the request
if (isset($_GET['cv_id'])) {
    $cv_id = $_GET['cv_id'];
    $cvData = $database->get_cv_info($cv_id);

    // Set headers for JSON response
    header('Content-Type: application/json');
    echo json_encode($cvData, JSON_PRETTY_PRINT);
} else {
    // Handle error if cv_id is not provided
    header('Content-Type: application/json');
    echo json_encode(['error' => 'cv_id parameter is required'], JSON_PRETTY_PRINT);
}
?>