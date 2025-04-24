<?php 
    require_once '../session_cookie.php';
    session_start();
    $dsn = "mysql:host=localhost;dbname=jobseeker";
    $db_name = 'root';
    $dbpwd = "";
    try{
        $pdo = new PDO($dsn,$db_name,$dbpwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo json_encode(['status' => 'error', 'message' => 'Could not connect to the database.']);
        exit();
    }

    $_username = $_POST["username"];
    $_pwd = $_POST["pwd"];
    $_email = $_POST["email"];
   

    

    include('register_contr.inc.php');
    #Error handle 
    $is_error = false;
    $errors = array();
    if(is_input_empty($_username,$_email,$_pwd)){
        array_push($errors,"Username, email or password can not be empty");
        $is_error = true;
    }
    if(is_email_invalid($_email)){
        array_push($errors,"Email is invalid");
        $is_error = true;
    }
    if(is_username_used($pdo,$_username)){
        echo "<h1>Username has already been used</h1>";
        $is_error = true;
        array_push($errors,"Username has already been used");
    }
    if(is_email_used($pdo,$_email)){
        array_push($errors,"Email has already been used");
        $is_error = true;

    }
    # check minimum length 8 (pwd)
    if(strlen($_pwd)<8){
        $is_error = true;
        array_push($errors,"Password's length must be greater than 8");    
    }
    #check both letter and digit:
    if(!hasLetterDigit($_pwd)){
        $is_error = true;
        array_push($errors,"Password must contain at least 1 letter and 1 digit");
    }
    #check uppercase 
    if(!hasUppercase($_pwd)){
        $is_error = true;
        array_push($errors,"Password must have at least one uppercase letter");
    }
    # use htmlspecialchars: prevent malicious user to inject code 

    # hashing password before insert to database
    if(!$is_error){
        $id = add_user($pdo,$_username,$_pwd,$_email);
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $_username;
        $_SESSION['email'] = $_email;
        echo json_encode(['status' => 'success']);
       
    }else{
        echo json_encode(['status' => 'error', 'errors' => $errors]);
    }
?>