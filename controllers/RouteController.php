<?php
// Check if the 'page' parameter exists in the URL
$page = isset($_GET['page']) ? $_GET['page'] : ''; // Default to 'home'
include_once __DIR__ . '/../config/Database.php';

$database = new Database();
$db = $database->getConnection();


$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$base_path = __DIR__ . '/../views/';
$file_path = '';

switch ($page) {
    case 'home':
        $file_path = $base_path . 'home/home.php';
        break;
    case 'your_cv':
        if (!isset($_SESSION['username'])) {
            include 'views/login_reg/login_reg.php';
            exit();
        }
        $file_path = $base_path . 'cv_builder/cv.php';
        break;
    case 'contact_us':
        $file_path = $base_path . 'contact_us/contact_us.php';
        break;
    default:
        $file_path = $base_path . 'login_reg/login_reg.php';
        break;
}


if (file_exists($file_path)) {
    include $file_path;
} else {

    echo "<h2>404 - Page not found</h2>";
    echo "<p>The page you are looking for does not exist.</p>";
}
