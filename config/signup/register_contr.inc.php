<?php

declare(strict_types=1);


function is_input_empty(string $username,string $email, string $pwd){
    if(!$username || !$email || !$pwd){
        return true;
    }
    return false;
}

# use filter_var($email,FILTER_VALIDATE_EMAIL) => check validity of email 
function is_email_invalid(string $email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return true;
}

# check username exists ?
function get_users(PDO $pdo, string $username){
    $sql = "SELECT * FROM user_table WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username',$username);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
function is_username_used(PDO $pdo,string $username){
    if(get_users($pdo,$username)){
        return true;
    }
    return false;
}

# check email used ?

function get_email(PDO $pdo, string $email){
    $sql = "SELECT username FROM user_table WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res;
}
function is_email_used(PDO $pdo,string $email){
    if(get_email($pdo,$email)){
        return true;
    }
    return false;
}

# pass error, add user to database 
function add_user(PDO $pdo,string $username,string $pwd,string $email){
    $query = "INSERT INTO user_table(username,password,email) values (:username,:password,:email);";
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd,PASSWORD_BCRYPT,$options);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password",$hashedPwd);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $lastInsertedId = $pdo->lastInsertId();
    return $lastInsertedId;
}

#check both letter and digit:

function hasLetterDigit(string $str){
    return preg_match('/[A-Za-z]/', $str) && preg_match('/\d/', $str);
}

#check uppercase
function hasUppercase($string) {
    return preg_match('/[A-Z]/', $string) === 1;
}