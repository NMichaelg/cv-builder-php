<?php
require_once '../session_cookie.php';
session_start();

$dsn = "mysql:host=localhost;dbname=jobseeker";
$db_name = 'root';
$dbpwd = "";

try {
    $pdo = new PDO($dsn, $db_name, $dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Could not connect to the database.']);
    exit();
}


$_email = $_POST['email'];
$_pwd = $_POST['pwd'];

include('login_contr.inc.php');
$is_error = false;
$errors = array();


if (is_input_empty($_email, $_pwd)) {
    $errors[] = "Cannot enter empty input.";
    $is_error = true;
}


$result = get_by_email($pdo, $_email);
if (!is_email_exist($result)) {
    $errors[] = "No account found with this email.";
    $is_error = true;
}

if (is_email_exist($result) && is_password_wrong($_pwd, $result['password'])) {
    $errors[] = "Wrong password.";
    $is_error = true;
}


if (!$is_error) {
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['username'] = $result['username'];
    $_SESSION['email'] = $result['email'];

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'errors' => $errors]);
}
?>
